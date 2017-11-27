import Vue from 'vue'
import axios from 'axios'
import bootstrap from 'bootstrap'
import posts from './posts.vue'
import InfiniteLoading from 'vue-infinite-loading'
import loader from './loader.vue'

import $ from 'jquery'
import 'slick-carousel'


var myQuery = ""
if(typeof(areaId) != "undefined"){
  myQuery += areaId != 0 || areaId != "" ? myQuery += '&area='+areaId : ""
}


if (document.getElementById('hotels')) {
  const hotelsInstance = new Vue({
    el: "#hotels",
    data() {
      return {
        hotels: [],
        areas: [],
        madoris: [],
        page:1,
        total:0,
        secondflag: true,
        
        // get search query
        query_area:[],
        query_madori:[],
        query_type:null,
        query_state:null,
        // output search query
        query_area_s:"",
        query_madori_s:"",
        query_type_s:"",
        query_state_s:"",

        query_flag:false,
      }
    },
    components:{
      posts,
      loader,
      InfiniteLoading,
    },
    methods:{
      infiniteHandler($state) {
        setTimeout(() => {
          this.page = this.page + 1
          if(this.query_flag) myQuery = this.query_area_s+this.query_madori_s+this.query_type_s+this.query_state_s
          axios.get(BASEURL + '/hotel?page='+this.page+myQuery)
          .then( (response) => {
            response.data.map((x)=>{
              this.posts.push(x)
            })
          })
          $state.loaded()
          if(this.page >= this.total) $state.complete()
        }, 1000); 
      },
      getmethod(){
        this.hotels = []
        this.secondflag = true
        this.query_flag = true
        axios.get(BASEURL + '/hotel?page=1'+this.query_area_s+this.query_madori_s+this.query_type_s+this.query_state_s)
        .then( (response) => {
          this.hotels = response.data
          if(response.data.length==0) this.secondflag = false
        })
      },
    },
    mounted(){
      axios.get(BASEURL + '/hotel?page=1'+myQuery)
      .then( (response) => {
        this.hotels = response.data
        if(response.data.length==0) this.secondflag = false
          this.$nextTick(()=>{
            $('.open__btn').on('click',function(){
                $(this).next().toggleClass('open__state_on')
              })
          })
      })
      axios.get(BASEURL + '/area?per_page=50').then( (response) => { this.areas = response.data })
      axios.get(BASEURL + '/madori?per_page=30').then( (response) => { this.madoris = response.data })
    },
    watch: {
      query_area: function () {
        this.query_area_s = this.query_area
        if(this.query_area.length) this.query_area_s = '&area='+this.query_area_s.join(',')
        this.getmethod()
      },
      query_madori: function () {
        this.query_madori_s = this.query_madori
        if(this.query_madori.length) this.query_madori_s = '&madori='+this.query_madori_s.join(',')
        this.getmethod()
      },
      query_type: function () {
        this.query_type_s = '&type='+this.query_type
        this.getmethod()
      },
      query_state: function () {
        this.query_state_s = '&state='+this.query_state
        this.getmethod()
      },
    },
  })
}




/*******************
  mainimg - home
*******************/

if (document.getElementById('homeMainimg')) {
  const homeMainimgInstance = new Vue({
    el: "#homeMainimg",
    data() {
      return {
        images: [],
        errors: [],
      };
    },
    methods: {
      getImgUrl(post,size){
        return post['_embedded']['wp:featuredmedia'][0]['media_details']['sizes'][size]['source_url'];
      },
    },
    mounted(){
      axios.get(BASEURL + '/pages?slug=home')
      .then( (response) => {
        this.images = response.data[0].acf.sliderImg
        this.$nextTick(()=>{
          $('.slick').slick({
            prevArrow: "<span class='slick__allow_prev'></span>",
            nextArrow: "<span class='slick__allow_next'></span>",
            dots: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
          })
        })
      })
    }
  })
}

if (document.getElementById('hotel')) {
  var hotelInstance = new Vue({
    el: "#hotel",
    data() {
      return {
        hotel: [],
        errors: [],
      };
    },
    methods: {
    },
    components:{
    },
    mounted(){
      axios.get(BASEURL + '/hotel/'+postId)
      .then((response)=> {
        this.hotel = response.data;
        // hotelInstance.area_id = response.data.area[0];

        this.$nextTick(function(){
          var map;
          var marker;
          var center = {
            lat: Number(this.hotel.acf.gmap.lat), // 緯度
            lng: Number(this.hotel.acf.gmap.lng) // 経度
          }
          function initMap() {
           map = new google.maps.Map(document.getElementById('googleMap'), { // #sampleに地図を埋め込む
              center: center, // 地図の中心を指定
              zoom: 15 // 地図のズームを指定
             });
           
            marker = new google.maps.Marker({ // マーカーの追加
              position: center, // マーカーを立てる位置を指定
              map: map // マーカーを立てる地図を指定
            });
          }
          initMap();
        })
      })
      
    }
  })
}