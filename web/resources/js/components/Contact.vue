<template>
  <section class="contact">
    <b-container fluid="lg">
      <b-row>
        <b-col>
          <h4>Want to talk?</h4>
          <p>If you like what you see &amp; are interested in dicussing future projects, you can contact me using the form below.</p>
          <p><strong>Availability: </strong> My current position takes up most of my time. With limited availability, I may only be available for smaller projects.</p>
        </b-col>
        <b-col
          cols="*"
          xs="12"
          sm="12"
          lg="8"
        >
          <b-form>
            <b-row>
              <b-col
                cols="*"
                sm="12"
                lg="6"
              >
                <b-form-group
                  id="email"
                  label="Email address:"
                  label-for="email"
                >
                  <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    required
                    size="lg"
                    placeholder="Enter email"
                  />
                </b-form-group>
              </b-col>
              <b-col
                col
                sm="12"
                lg="6"
              >
                <b-form-group
                  id="input-group-2"
                  label="Your Name:"
                  label-for="input-2"
                >
                  <b-form-input
                    id="input-2"
                    v-model="form.name"
                    required
                    size="lg"
                    placeholder="Enter name"
                  />
                </b-form-group>
              </b-col>
              <b-col sm="12">
                <b-form-textarea
                  id="contactMessage"
                  v-model="form.text"
                  placeholder="I'm listening, drop me a message here."
                  rows="3"
                  size="lg"
                  max-rows="6"
                  class="mb-3"
                />       
              </b-col>
              <b-col
                sm="12"
                class="d-flex justify-content-end"
              >     
                <b-button
                  type="submit"
                  size="lg"
                  variant="primary"
                >
                  Submit
                </b-button>
              </b-col>
            </b-row>
          </b-form>
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>
	export default {
    name: 'Contact',
    data() {
      return {
        form: {
          email: '',
          name: '',
          text: ''
        }
      }
    }
	}
</script>

<style scoped>

</style>
