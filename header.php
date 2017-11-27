<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width initial-scale=1" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/node_modules/slick-carousel/slick/slick.css" type="text/css" />
		<?php wp_head(); ?>
	</head>
	<body>

		<?php get_template_part( 'parts', 'global_nav' ) ?>
		<?php get_template_part( 'parts', 'mainimg' ) ?>