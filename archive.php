<?php
/*
Template Name: hotelアーカイブ -
*/
?>
<?php get_header();?>

<main>
		
	<article id="hotels" class="wrap__normal">
		<h2 class="title__large">ROOMS</h2>
		
		<div class="search__wrap">
			<span class="open__btn">Search</span>
			<!-- <span class="open__btn" @click="opens(this)">Search</span> -->
			<div class="search search__hotel">
				<div class="search__area search__item">
					<p class="title__mini col-sm-3 col-xs-12">地域</p>
					<div class="checkbox col-sm-9 col-xs-12">
						<label class="checkbox-inline" v-for="area in areas">
						  <input type="checkbox" :id="area.taxonomy + area.id" :value="area.id" v-model="query_area"> {{area.name}}
						</label>
					</div>
				</div>
				<div class="search__madori search__item">
					<p class="title__mini col-sm-3 col-xs-12">間取り</p>
					<div class="checkbox col-sm-9 col-xs-12">
						<label class="checkbox-inline" v-for="madori in madoris">
						  <input type="checkbox" :id="madori.taxonomy + madori.id" :value="madori.id" v-model="query_madori"> {{madori.name}}
						</label>
					</div>
				</div>
				<div class="search__type search__item">
					<p class="title__mini col-sm-3 col-xs-12">オススメ</p>
					<div class="radio col-sm-9 col-xs-12">
						<label class="radio-inline">
						  <input type="radio" name="type" id="typeFamily" value="54" v-model="query_type"> ファミリー向け
						</label>
						<label class="radio-inline">
						  <input type="radio" name="type" id="typeAlone" value="53" v-model="query_type"> 一人暮らし
						</label>
					</div>
				</div>
				<div class="search__state search__item">
					<p class="title__mini col-sm-3 col-xs-12">契約状態</p>
					<div class="radio col-sm-9 col-xs-12">
						<label class="radio-inline">
						  <input type="radio" name="state" id="stateFlase" value="56" v-model="query_state"> 募集中
						</label>
						<label class="radio-inline">
						  <input type="radio" name="state" id="stateTrue" value="55" v-model="query_state"> 契約済
						</label>
					</div>
				</div>
			</div>
		</div>


		<section v-for="(hotel,index) in hotels"  class="posts col-md-3 col-sm-4 col-xs-6">
			<posts :post="hotel" />
		</section>
		<loader
			:flag="!hotels.length"
			:secondflag="secondflag"
		/>
		<infinite-loading @infinite="infiniteHandler"></infinite-loading>
	</article>
</main>

<?php get_footer();?>
