<figure>
	<img :src="getImgUrl(hotel,'medium')" :alt="hotel.title.rendered+'の画像'">
</figure>

<h3 class="title__mini"><a :href="hotel.link">{{hotel.title.rendered}}</a></h3>
<!-- <ul class="hotel__gallery">
	<li v-for="(gallery,index) in hotel.acf.room_gallery" v-if="index < 5">
		<img :src="imageThumb(gallery.url)" :alt="hotel.title.rendered + 'の写真' + ( index + 1 )">
	</li>
</ul> -->
<div class="hotel__price">
	<span class="hotel__price__base">{{hotel.acf.price_base}}万円</span>
	<span class="hotel__price__shiki">敷 {{hotel.acf.price_shiki}}</span> / 
	<span class="hotel__price__rei">礼 {{hotel.acf.price_rei}}</span>
</div>
<p class="hotel__station" v-html="hotel.acf.room_station"></p>