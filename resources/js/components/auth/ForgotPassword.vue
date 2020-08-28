<style type="text.css">

</style>

<template>
   	<div>
        <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>
                  <form @submit.prevent="requestResetPassword">
                
                    <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" v-model="form.email" required>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <hr>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <router-link :to="{name: 'login'}" class="font-weight-bold small">Back to Login page!</router-link>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
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
    data() {
      return {
        form:{
        email: null,
        }
      }
    },
    methods:{
    requestResetPassword(){
      axios.post('/api/auth/password/email',this.form)
      .then(res => {
        Toast.fire({
          icon: 'success',
          title: 'Send email reset successfully'
        })
        // this.$router.push({ name: 'dashboard'})
      })

       .catch(error =>this.errors = error.response.data.errors)
       
    }
  }
}
</script>