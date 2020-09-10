import Login from './components/auth/login.vue'
import Register from './components/auth/register.vue'
import Logout from './components/auth/logout.vue'
import ForgotPassword from './components/auth/ForgotPassword.vue'
import ResetPasswordForm from './components/auth/ResetPasswordForm.vue'
import Home from './components/pages/Home.vue'
import Dashboard from './components/pages/Dashboard.vue'
import StoreTodo from './components/pages/todo/create.vue'
import Todo from './components/pages/todo/index.vue'
import EditTodo from './components/pages/todo/edit.vue'
import User from './components/auth/user/index.vue'
import EditUser from './components/auth/user/edit.vue'

export const routes = [
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/reset-password',
        name: 'reset-password',
        component: ForgotPassword
    },
    {
        path: '/reset-password/:token',
        name: 'reset-password-form',
        component: ResetPasswordForm
    },
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/store-todo',
        name: 'store-todo',
        component: StoreTodo
    },
    {
        path: '/todos',
        name: 'todos',
        component: Todo
    },
    {
        path: '/edit-todo/:id',
        name: 'edit-todo',
        component: EditTodo
    },
    {
        path: '/users',
        name: 'user',
        component: User
    },
    {
        path: '/edit-user/:id',
        name: 'edit-user',
        component: EditUser
    }
]
