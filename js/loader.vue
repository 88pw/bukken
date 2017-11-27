<template>
	<div class="loading__wrap">
    <div class="loading" v-if="flag && secondflag">
      <div class="loading__inner">
        <i class="loading__icon fa fa-spinner fa-spin fa-3x fa-fw"></i>
        <div class="loading__message">読み込み中...</div>
      </div>
    </div>
   	<div class="loading-none" v-if="!secondflag">
   		<p>No more data :)</p>
   	</div>
   </div>
</template>

<script>
  import loader from './loader';
  export default loader;
</script>