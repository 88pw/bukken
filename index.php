<?php
/*
Template Name: トップページ -
*/
?>
<?php get_header();?>

<main>
	<article id="hotels" class="wrap__normal">
		<h2 class="title__large">ROOMS</h2>
		<section v-for="(hotel,index) in hotels" v-if="index < 3"  class="posts col-md-4 col-sm-4 col-xs-6">
			<posts :post="hotel" />
		</section>
		<section v-for="(hotel,index) in hotels" v-if="index > 3 && index < 8"  class="posts col-md-3 col-sm-3 col-xs-6">
			<posts :post="hotel" />
		</section>
		<loader
			:flag="!hotels.length"
			:secondflag="secondflag"
		/>
	</article>
</main>

<?php get_footer();?>
