

<template>

  <div>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <!-- Row -->
                  <!-- <div class="row">
                    <router-link to="/store-todo" class="btn btn-primary">Create Todo </router-link>

                  </div> -->
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">List of Users</h1>
                  </div>

                  <div class="row">

                    <!-- DataTable with Hover -->
                    <div class="col-lg-12">
                      <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">DataTables of Users</h6>
                        </div>
                        <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>
                                  <router-link :to="{ name: 'edit-user', params: { id:user.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                                  <a @click="deleteUser(user.id)" class="btn btn-sm btn-danger">
                                    <font color="#ffffff">Delete</font>
                                  </a>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

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
  mounted() {
    if (!User.loggedIn()) {
      this.$router.push({ name: 'home' })
    }
  },
  data() {
    return {
      users: [],
    }
  },
  methods: {
    allUsers() {
      axios
        .get('/api/users')
        .then(({ data }) => (this.users = data))
        .catch()
    },
    deleteUser(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete('/api/users/' + id)
            .then(() => {
            this.allUsers()
            })
            .catch(() => {
              this.$router.push({ name: 'user' })
            })

          Swal.fire('Deleted!', 'Your file has been deleted.', 'success')
        }
      })
    },
  },
  created() {
    this.allUsers()
  },
}
</script>


<style type="text/css">
</style>
