<?php
/*
Template Name: 物件詳細 -
*/
?>
<?php include 'header.php' ?>

<main>

	<div id="hotel" class="main_inner">

<!--     	<div class="loading" v-if="!hotels_in_area.length">
    	  <div class="preloader">
    	    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
    	    <div class="loading__message">読み込み中...</div>
    	  </div>
    	</div> -->
	
		<article class="hotel__single">


			<section class="section-image wrap__mini">
				<h2 class="title__large" v-text="hotel.acf.name"></h2>
				<div class="section-image__left col-sm-7 col-xs-12">
					<div class="section-image__description" v-html="hotel.acf.room_recommend"></div>
					<table class="table">
						<tr v-if="hotel.acf.room_add">
							<td class="table__first">住所</td>
							<td class="table__second">{{hotel.acf.room_add}}</td>
						</tr>
						<tr v-if="hotel.madori_name">
							<td class="table__first">間取り</td>
							<td class="table__second" v-text="hotel.madori_name"></td>
						</tr>
						<tr v-if="hotel.acf.price_base">
							<td class="table__first">賃料</td>
							<td class="table__second" v-text="hotel.acf.price_base+'万円'"></td>
						</tr>
					</table>
				</div>
				<div class="section-image__right col-sm-5 col-xs-12">
					<div v-for="madori in hotel.acf.madoris">
						<img :src="madori.image.url">
					</div>
				</div>
			</section>
	
			<section class="background__color_gray">
				<div class="wrap__mini">
					<div class="gallery-item col-sm-2 col-xs-4" v-for="gallery in hotel.acf.room_gallery">
						<img :src="gallery.sizes.thumbnail" caption="gallery.caption">
					</div>
				</div>
			</section>

		</article>

		<section>
			<div id="googleMap"></div>
		</section>

		<section class="contact">
			<div class="wrap__mini">
				<h2 class="title__large">お問い合わせはこちら</h2>
				<div class="contact__left col-sm-6 col-xs-12">
					<a href="" class="contact__tel">06-6210-1429</a>
				</div>
				<div class="contact__right col-sm-6 col-xs-12">
					<a href="" class="btn">メールでのお問い合わせ</a>
				</div>
			</div>
		</section>

	</div>

	<article id="hotels" class="background__color_gray">
		<div class="wrap__normal">
			<h2 class="title__large">同一エリアの物件</h2>
			<section v-for="(hotel,index) in hotels" v-if="index < 3"  class="posts col-md-4 col-sm-4 col-xs-6">
				<posts :post="hotel" />
			</section>
			<loader
				:flag="!hotels.length"
				:secondflag="secondflag"
			/>
		</div>
	</article>

</main>

<?php
	if ($terms = get_the_terms($post->ID, 'area')) {
		$terms_num = "";
	    foreach ( $terms as $term )  $terms_num .= $term->term_id . ',';
	    $terms_num = preg_replace("/(.*)[,]/","$1",$terms_num);
	}
?>

<script>
	var postId = "<?php echo get_the_id() ?>";
	var areaId = "<?php echo $terms_num ?>";
</script>


<?php get_footer();?>