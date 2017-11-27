<?php
/*
Template Name: ページテンプレート -
*/
?>
<?php include 'header.php' ?>

<main>
	<div class="main_inner">

		<?php the_content() ?>

	</div>
</main>

<script>
	var postId = <?php echo get_the_id() ?>;
</script>


<?php get_footer();?>