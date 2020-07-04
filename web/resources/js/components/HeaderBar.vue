<template>
  <b-navbar
    fixed="top"
    toggleable="sm"
    :type="(nightMode) ? 'dark' : 'light'"
    variant="default"
    class="head"
  >
    <b-navbar-brand
      class="logo"
      href="#"
    >
      <img
        src="/images/logo-transparent.svg"
        alt=""
      >
    </b-navbar-brand>

    <b-collapse
      id="nav-collapse"
      is-nav
    >
      <b-navbar-nav>
        <b-nav-item
          to="/"
          @click="scroll({behavior: 'smooth'}, '.head')"
        >
          <span>Welcome</span>
        </b-nav-item>
        <b-nav-item
          to="/#/contact"
          @click="scroll({behavior: 'smooth'}, '.contact')"
        >
          <span>Contact</span>
        </b-nav-item>
      </b-navbar-nav>
    </b-collapse>

    <!-- Right aligned nav items -->
    <b-navbar-nav class="socials">
      <b-nav-item
        href="https://www.github.com/tjrchampion"
        target="_blank"
      >
        <feather type="github" />
      </b-nav-item>
      <b-nav-item
        href="https://www.twitter.com/tjrchampion"
        target="_blank"
      >
        <feather type="twitter" />
      </b-nav-item>
      <b-nav-item class="theme-toggle-item">
        <button
          v-if="nightMode"
          key="save"
          class="theme-toggle light"
          @click="toggleTheme"
        >
          <feather type="sun" />
        </button>
        <button
          v-else
          key="edit"
          class="theme-toggle dark"
          @click="toggleTheme"
        >
          <feather type="moon" />
        </button>
      </b-nav-item>
      <b-navbar-toggle target="nav-collapse" />
    </b-navbar-nav>
  </b-navbar>
</template>

<script>

	import bus from '../../js/bus';

	export default {
		name: 'Heady',
		data() {
			return {
        nightMode: false
      }
    },
    mounted() {

			bus.$on('nightMode', (mode) => {
        if(mode === 'false') {
          this.nightMode = false;
        } 
        if(mode === 'true') {
            this.nightMode = true;
        }
      });

    },
		methods: {

			toggleTheme() {
        this.nightMode = !this.nightMode;
        localStorage.setItem('nightMode', this.nightMode);
        bus.$emit('nightMode', this.nightMode);
      },
      scroll(options, el) {

        const element = document.querySelector(el);
        let y;

        if(el == '.contact') {
          let yOffset = -85; 
          y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
        }

        if(el == '.head') {
          y = element.scrollTop = 0;
        }

        if (element) {
          window.scrollTo({top: y, behavior: 'smooth'});
        }
      }

		}
	}
</script>