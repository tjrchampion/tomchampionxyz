<template>
	<div>
		<router-view></router-view>
	</div>
</template>

<script>

	import Bus from '../Bus';

	const csrfToken = {
    csrf_name: document.querySelector('meta[name="csrf_name"]').getAttribute('content'),
    csrf_value: document.querySelector('meta[name="csrf_value"]').getAttribute('content')	
	};

	export default {

		mounted() {
			Bus.$emit('csrf', csrfToken);
		}

	}
</script>

<style scoped>

</style>
