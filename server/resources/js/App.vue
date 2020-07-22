<template>
    <div>

        <!-- フォーム -->
        <div class="con">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>たのしいレシピ</title>
                <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
            </head>

            <!-- ヘッダー -->
            <div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
                <button class="menu-icon" type="button" data-toggle></button>
                <div class="title-bar-title"></div>
            </div>
            <div class="top-bar" id="realEstateMenu">
                <div class="top-bar-right">
                    <ul class="menu">
                        <li><router-link :to="{ name: 'Main' }">main</router-link></li>
                        <li>comment</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>



<script>
import axios from 'axios';
  export default {
    data: {
      cooking: null,
    },
    mounted: function(){
        // Laravel側からデータを取得
      axios.get('/api/cooking')
      .then(function(response){
          console.log(response);
        this.cooking = response.data.cooking_records;
      }.bind(this))
      .catch(function(error){
        console.log(error)
      })
    }
  }
</script>

<style>
body{
background-color: white;
};
</style>