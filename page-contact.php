<?php
/*
Template Name: お問い合わせ -
*/
?>
<?php include 'header.php' ?>

<main>
	<article class="main_inner">

		<section>
			<div class="wrap__mini">
				<!-- <h2 class="title__large">フォーム</h2> -->
				<?php echo do_shortcode('[contact-form-7 id="4681" title="お問い合わせ"]') ?>
			</div>
		</section>

	</article>
</main>

<script>
	var postId = <?php echo get_the_id() ?>;
</script>


<?php get_footer();?>