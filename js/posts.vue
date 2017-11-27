<template>
	<div class="posts__inner">
		<a :href="post.link">
			<figure class="posts__image" v-if="getImgUrlACF(post,imagesize)">
				<span v-if="post.state_name=='募集中'" class="posts__state posts__state_false" v-text="post.state_name"></span>
				<span v-if="post.state_name=='契約済'" class="posts__state posts__state_true" v-text="post.state_name"></span>
				<img :src="getImgUrlACF(post,imagesize)" :alt="post.title.rendered">
			</figure>
			<div class="posts__content">
				<h2 class="posts__title title__normal" v-text="post.title.rendered"></h2>
				<div class="posts__subcontent">
					<span class="posts__tips" v-if="post.acf.room_add" v-text="post.acf.room_add"></span>
					<span class="posts__tips" v-if="post.madori_name" v-text="post.madori_name"></span>
					<span class="posts__tips" v-if="post.acf.price_base" v-text="post.acf.price_base+'万円'"></span>
				</div>
			</div>
		</a>
	</div>
</template>

<script>
  import posts from './posts';
  export default posts;
</script>