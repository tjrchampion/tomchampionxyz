<template>
  <b-navbar
    fixed="top"
    toggleable="sm"
    type="light"
    variant="default"
  >
    <b-navbar-brand href="#">
      <img
        src="/images/logo.svg"
        alt=""
      >
    </b-navbar-brand>

    <b-navbar-toggle target="nav-collapse" />

    <b-collapse
      id="nav-collapse"
      is-nav
    >
      <b-navbar-nav>
        <b-nav-item to="/">
          Welcome
        </b-nav-item>
        <b-nav-item to="/register">
          Who am i?
        </b-nav-item>
        <b-nav-item to="/blog">
          Blog
        </b-nav-item>
        <b-nav-item to="/contact">
          Contact
        </b-nav-item>
      </b-navbar-nav>
				
      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto externals">
        <b-nav-item
          href="https://www.github.com/tjrchampion"
          target="_blank"
        >
          <feather type="github" />
        </b-nav-item>
        <b-nav-item
          href="https://www.twitter.com"
          target="_blank"
        >
          <feather type="twitter" />
        </b-nav-item>				
        <b-nav-item>
          <button
            class="toggle-night-mode"
            @click="toggleTheme()"
          >
            <feather
              v-if="!nightMode"
              type="moon"
            />
            <feather
              v-if="nightMode"
              type="sun"
            />
          </button>
        </b-nav-item>				
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>

	export default {
		name: 'Heady',
		data() {
			return {
				nightMode: false
			}
		},
		methods: {

			toggleTheme() {
				this.nightMode = !this.nightMode;
			}

		}
	}
</script>