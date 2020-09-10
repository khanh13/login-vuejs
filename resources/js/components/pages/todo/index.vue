

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
                  <div class="row">
                    <router-link to="/store-todo" class="btn btn-primary">Create Todo </router-link>

                  </div>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">All Todos</h1>
                  </div>

                  <div class="row">

                    <!-- DataTable with Hover -->
                    <div class="col-lg-12">
                      <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
                        </div>
                        <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <tr v-for="todo in todos" :key="todo.id">
                                <td>{{ todo.id }}</td>
                                <td>{{ todo.name }}</td>
                                <td>{{ todo.description }}</td>
                                <td>
                                  <router-link :to="{ name: 'edit-todo', params: { id:todo.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                                  <a @click="deleteTodo(todo.id)" class="btn btn-sm btn-danger">
                                    <font color="#ffffff">Delete</font>
                                  </a>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="row">
                      <div class="col-lg-12 mb-4">
                        <div class="card">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Todo List</h6>
                          </div>
                          <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                              <thead class="thead-light">
                                <tr>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="todo in todos" :key="todo.id">
                                  <td>{{ todo.name }}</td>
                                  <td>{{ todo.description }}</td>
                                  <td>
                                    <a href="" class="btn btn-sm btn-primary">Details</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                          <div class="card-footer"></div>
                        </div>
                      </div>
                    </div> -->

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
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: 'home' })
    }
  },
  data() {
    return {
      todos: [],
    }
  },
  methods: {
    allTodo() {
      axios
        .get('/api/todos/')
        .then(({ data }) => (this.todos = data))
        .catch()
    },
    deleteTodo(id) {
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
            .delete('/api/todos/' + id)
            .then(() => {
            //   this.$router.push({ name: 'todos' })
            // this.todos = (todo =>{
            //     return todo.id != id
            // })
            this.allTodo()
            })
            .catch(() => {
              this.$router.push({ name: 'todos' })
            })

          Swal.fire('Deleted!', 'Your file has been deleted.', 'success')
        }
      })
    },
  },
  created() {
    this.allTodo()
  },
}
</script>


<style type="text/css">
</style>
