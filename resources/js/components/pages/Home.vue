<style type="text.css">

</style>

<template>
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Home Page</h1>
                </div>

                <div class="text-center">
                  <router-link :to="{name: 'login'}" class="btn btn-primary btn-block">Login</router-link>
                </div>

                <hr>

                <div class="text-center">
                  <router-link :to="{name: 'register'}" class="btn btn-primary btn-block">Create an Account!</router-link>
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

</script>