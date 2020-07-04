<template>
  <section class="contact">
    <b-container fluid="lg">
      <b-row>
        <b-col>
          <h4>Want to talk?</h4>
          <p>If you like what you see &amp; are interested in dicussing future projects, you can contact me using the form.</p>
          <p><strong>Availability: </strong> My current position takes up most of my time. With limited availability, I may only be available for smaller projects.</p>
        </b-col>
        <b-col
          cols="*"
          xs="12"
          sm="12"
          lg="8"
        >
          <b-form @submit.prevent="submit()">
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
                    id="formEmail" 
                    v-model="form.email" 
                    v-validate="'required|email'" 
                    name="email"
                    :class="{ 'is-invalid': submitted && errors.has('email') }"
                    type="email"
                    size="lg"
                    placeholder="Enter email"
                  />
                  <b-form-invalid-feedback v-if="submitted && errors.has('email')">
                    {{ errors.first("email") }}
                  </b-form-invalid-feedback>
                </b-form-group>
              </b-col>
              <b-col
                col
                sm="12"
                lg="6"
              >
                <b-form-group
                  label="Your full name"
                  label-for="input-2"
                >
                  <b-form-input
                    id="formName" 
                    v-model="form.name" 
                    v-validate="'required|min:3'" 
                    name="name"
                    :class="{ 'is-invalid': submitted && errors.has('name') }"
                    type="text"
                    size="lg"
                    placeholder="Enter your full name"
                  />
                  <b-form-invalid-feedback v-if="submitted && errors.has('name')">
                    {{ errors.first("name") }}
                  </b-form-invalid-feedback>
                </b-form-group>
              </b-col>
              <b-col sm="12">
                <b-form-textarea
                  id="formBody"
                  v-model="form.body"
                  v-validate="'required|min:3'" 
                  name="body"
                  :class="{ 'is-invalid': submitted && errors.has('body') }"
                  type="text"
                  size="lg"
                  placeholder="Drop me a message here, i'm listening..."
                />
                <b-form-invalid-feedback v-if="submitted && errors.has('body')">
                  {{ errors.first("body") }}
                </b-form-invalid-feedback>                   
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
                  <feather
                    v-if="submitting"
                    type="loader"
                    animation="spin"
                    animation-speed="slow"
                    size="16"
                  /> 
                  <feather
                    v-if="!submitting"
                    type="send"
                    size="16"
                  />                   
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

  import axios from 'axios';
  import Swal from 'sweetalert2'

	export default {
    name: 'Contact',
    data() {
      return {
        submitted: false,
        submitting: false,
        form: {
          email: '',
          name: '',
          body: ''
        }
      }
    },
    methods: {
      submit() {
        this.submitted  = !this.submitted;
        this.submitting  = !this.submitting;
        this.$validator.validate().then(valid => {
          if (valid) {

            axios.post('/contact', this.form).then(() => {
              this.submitted = !this.submitted;
              this.submitting = !this.submitting;
              Swal.fire({
                title: `Thanks, ${this.form.name}.`,
                text: 'I\'ll be in touch as soon as I can.',
                icon: 'success',
                confirmButtonText: 'Cool, close.',
                confirmButtonColor: '#02c39a',
                allowEscapeKey: false,
                allowOutsideClick: false
              }).then((result) => {
                if (result.value) {
                    this.submitted = false;
                    this.form.name = '';
                    this.form.email = '';
                    this.form.body = '';
                }
              });
            }).catch(error => {
              this.message = error.response.data;
            });

          }
          if(!valid) {
            this.submitting = !this.submitting;
          }
        });

      }
    }
	}
</script>

<style scoped>

</style>
