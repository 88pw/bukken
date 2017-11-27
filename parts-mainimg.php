<!--//////////////////////////////////
	home
//////////////////////////////////-->

<?php 
	if(is_front_page()){
		$class = '';
		$title = "We'll make you happy!!";
		$title_sub = '敷礼0円物件をお探しの方はAnestへ';
	}
?>

<?php
	if(is_page() && !is_front_page()){
		$class = 'sub-mainimg';
		$title = $post->post_title;
		$title_sub = '敷礼0円物件をお探しの方はAnestへ';
	}
?>

<?php
	if(is_archive()){
		$class = 'sub-mainimg';
		$title = 'ROOMS';
		$title_sub = '敷礼0円物件の一覧';
	}
?>

<?php
	if(is_single()){
		$class = 'sub-mainimg';
		$title = 'DETAIL';
		$title_sub = $post->post_title;
	}
?>


	<div id="homeMainimg" class="home-mainimg home <?php echo $class ?>" v-if="images">
		<div class="home-mainimg__overlay"></div>
		<div class="home-mainimg__logo">
			<p class="title__main">
				<?php echo $title ?>
			</p>
			<h1 class="title__sub">
				<?php echo $title_sub ?>
			</h1>			
		</div>
		<div class="home-mainimg__inner">
			<div class="home-mainimg__item slick">
				<div class="slick__item" v-for="img in images">
					<a v-if="img.link" href="img.link"><img :src="img.image"></a>
					<img v-else :src="img.image">
				</div>
			</div>
		</div>
	</div>