<template>
  <transition
    name="fade"
    mode="out-in"
  >
    <div
      class="theme"
      :class="{night: mode}"
    >
      <router-view />
    </div>
  </transition>
</template>

<script>
	import bus from './VueBus';

	export default {
		name: 'App',
		data() {
			return {
				mode: false 
			}
		},
		mounted() {
			bus.$on('nightMode', (mode) => {
				this.mode = JSON.parse(mode);
      });
		}
	}
</script>