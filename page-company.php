<?php
/*
Template Name: 会社概要 -
*/
?>
<?php include 'header.php' ?>

<main>
	<article class="main_inner">

		<section>
			<div class="wrap__mini">
				<h2 class="title__large">株式会社Anest</h2>
				<?php echo do_shortcode("[table id=74 /]") ?>
			</div>
		</section>

	</article>
</main>

<script>
	var postId = <?php echo get_the_id() ?>;
</script>

<?php get_footer();?>