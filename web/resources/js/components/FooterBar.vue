<template>
	<div>
		<footer class="footer-bar">
			<b-row>
				<b-col col lg="6">
					<p>&copy; Copyright {{nowYear}} <strong>{tc}</strong> Tom Champion.</p>
				</b-col>
				<b-col col lg="6" class="d-flex justify-content-end">
					Made with <feather type="heart" fill="#006a54" size="12" stroke="0" />
				</b-col>
			</b-row>			
		</footer>
	</div>
</template>

<script>
	export default {
		name: 'footerBar',
		data() {
			return {
				nowYear: new Date().getFullYear()
			}
		}
	}
</script>