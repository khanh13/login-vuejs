

<template>

  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="row">
                  <router-link to="/todos" class="btn btn-primary">All Todos </router-link>

                </div>
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create Todo</h1>
                </div>

                <!-- <div class="alert alert-danger" v-if="error && !success">
                <p v-if="error == 'login_error'">Validation Errors.</p>
                <p v-else>Error, unable to connect with these credentials.</p>
              </div> -->
                <form class="user" @submit.prevent="createTodo">

                  <div class="form-group">

                    <div class="form-row">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Todo Name" v-model="form.name">
                        <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                      </div>

                      <div class="col-md-6">
                        <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Description" v-model="form.description">
                        <small class="text-danger" v-if="errors.description"> {{ errors.description[0] }} </small>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
                </form>

                <hr>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: 'home' })
    }
  },

  data() {
    return {
      form: {
        name: null,
        description: null,
        // completed: null,
      },
      errors: {},
    }
  },

  methods: {
    createTodo() {
      const token = localStorage.getItem('token')
      axios
        .post('/api/todos', this.form, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((res) => {

          this.$router.push({ name: 'todos' })
          Notification.success()
        })

        .catch((error) => (this.errors = error.response.data.errors))
    },
  },
    }
</script>


<style type="text/css">
</style>
