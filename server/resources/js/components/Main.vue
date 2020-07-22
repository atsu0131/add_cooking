<template v-if="this.cooking">

  <div class="content" :class="customizedClass">
    <ul>
      <li v-for="item in cooking"><img  v-bind:src="item.image_url" width="50" height="25" alt="イラスト1"></li>
    </ul>
    <div class="button__top__contain">
      <div class="button-top" v-on:click="click_count_up">次の料理をみる！</div>
    </div>
    <div class="wrap" >
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
    <ul>
      <li v-for="item in cooking"><img  v-bind:src="item.image_url" width="100" height="50" alt="イラスト1"></li>
    </ul>

    <div class="comment__content">
    <p>コメント一覧</p>
    <p>------------</p>
    <p>美味しそう</p>
    <p>作ってみたい！</p>

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
              cooking: {
                recipe_type: null,
                comment : null,
                image_url: null
              },
            count_number: 0,
            customizedClass: 'white',
            item: 0
        };
    },
    mounted: function(){
        // Laravel側からデータを取得
      axios.get('/api/cooking')
      .then(function(response){

        if(response.data.cooking_records) { // または elem === null で比較
            for(var i = 0; i > 10; i++){
            this.cooking = response.data.cooking_records.push();
            
            }
            console.log(this.cooking);

        } else {
            console.error('見つからない');
        }

        
      }.bind(this))
      .catch(function(error){
        console.log(error)
      })

      if(this.cooking[this.count_number].recipe_type ==undefined){
      }else if(this.cooking[this.count_number].recipe_type =="main_dish"){
        this.customizedClass = "orange"
      }else if(this.cooking[this.count_number].recipe_type =="side_dish"){
        this.customizedClass = "green"
      }else{
        this.customizedClass = "white"
      }
    },
    methods:{
      click_count_up: function(){
        this.count_number++;

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
.content__second{
  width:30%;
}
.img-box{
  display: flex;
  flex-direction: row;

  width:30%;
  height: 100px;
}
.second-title{
  font-size: 50%;
}
.flex{
  width:30%;
  height: 100px;
  padding: 2.5% 0;
  display: flex;
  flex-direction: row;
  // justify-content: space-evenly;
}
ul {
     overflow: hidden;
     letter-spacing: -.5em;
}
li {
     display: inline-block;
     width: 10%;
     vertical-align: middle;
     letter-spacing: 0;
     text-align: center;
}
.comment__content{
  text-align: center;
}
</style>