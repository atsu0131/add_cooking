<template>

  <div class="content" :class="customizedClass">
    <div class="button__top__contain">
      <div class="button-top" v-on:click="click_count_up">次の料理をみる！</div>
    </div>
    <div class="wrap">
      <h4 class="services__item__title" v-if='this.cooking[this.count_number].recipe_type == "main_dish"'>主食</h4>
      <h4 class="services__item__title" v-else-if='this.cooking[this.count_number].recipe_type == "side_dish"'>副食</h4>
      <h4 class="services__item__title" v-else-if='this.cooking[this.count_number].recipe_type == "soup"'>スープ</h4>
      <h4 class="services__item__title" v-else>その他</h4>
      <h2 class="section-title">{{this.cooking[this.count_number].comment}}</h2>
      <div class="services__container">
        <div class="services__item">
          <figure class="services__item__img-box">
            <img  v-bind:src="this.cooking[this.count_number].image_url" alt="イラスト1">
          </figure>
        </div>
      </div>
    </div>
    </div><!-- /wrap -->
  </div>
</template>
<script>
import axios from 'axios'
  export default {
    data() {
        return {
            cooking: null,
            count: 0,
            count_number: 1,
            customizedClass: 'orange'
        };
    },
    mounted: function(){
        // Laravel側からデータを取得
      axios.get('/api/cooking')
      .then(function(response){

        this.cooking = response.data.cooking_records;
        console.log(this.cooking[1].comment);
      }.bind(this))
      .catch(function(error){
        console.log(error)
      })
    },
    methods:{
      click_count_up: function(){
        this.count_number++;
        if(this.cooking[this.count_number].recipe_type =="main_dish"){
          this.customizedClass = "orange"
        }else if(this.cooking[this.count_number].recipe_type =="side_dish"){
          this.customizedClass = "green"
        }else{
          this.customizedClass = "white"
        }
      }
    }
  }
</script>
<style lang="scss" scoped>
.content{
  width:100%;
}
.button__top__contain{
  text-align: center;
}
.button-top{
  margin: 20px 0;
  justify-content: center;
  display: inline-block;
  padding: 0.5em 1em;
  text-decoration: none;
  background: #668ad8;
  color: #FFF;
  border-bottom: solid 4px #627295;
  border-radius: 3px;
  cursor: pointer;
}
.services__item__img-box{  
  width :100%;
  text-align: center;
  padding-bottom: 50px;
}
.orange {
  background-color: #ffa500;
}
.green {
  background-color: #6b8e23;
}
.white {
  background-color: #fafad2;
}
</style>