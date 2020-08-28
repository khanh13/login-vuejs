<template>
    <div id="wrapper">
    <!-- Sidebar -->
    <Sidebar></Sidebar>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
            <Header></Header>
        <!-- Topbar -->

        <!-- Container Fluid-->
            <router-view></router-view>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
        <Footer></Footer>
      <!-- Footer -->
    </div>
  </div>

</template>
<script>

  import Sidebar from './Sidebar.vue'
  import Header from './Header.vue'
  import Footer from './Footer.vue'

  export default {
    data() {
      return {
        //
      }
    },
    components: {
      Sidebar, Header, Footer
    }
  }
</script>