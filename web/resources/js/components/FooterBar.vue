<template>
  <footer class="footer-bar">
    <b-row>
      <b-col
        cols="*"
        sm="12"
        md="6"
      >
        &copy; Copyright {{ nowYear }} <strong>{tc}</strong> Tom Champion.
      </b-col>
      <b-col
        cols="*"
        sm="12"
        md="6"
      >
        Made with <feather
          type="heart"
          fill="#006a54"
          size="12"
          stroke="0"
        />
      </b-col>
    </b-row>			
  </footer>
</template>

<script>
	export default {
		name: 'FooterBar',
		data() {
			return {
				nowYear: new Date().getFullYear()
			}
		}
	}
</script>