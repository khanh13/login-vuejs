
import Login from './components/auth/login.vue';
import Register from './components/auth/register.vue';
import Logout from './components/auth/logout.vue';
import ForgotPassword from './components/auth/ForgotPassword.vue';
import ResetPasswordForm from './components/auth/ResetPasswordForm.vue';
import Home from './components/pages/Home.vue';
import Dashboard from './components/pages/Dashboard.vue';

export const routes = [
  { 
    path: '/login', 
    component: Login, 
    name: 'login', 
    
  }, 
  { 
    path: '/logout', 
    component: Logout, 
    name: 'logout', 
    
  }, 
  { 
    path: '/register', 
    component: Register, 
    name: 'register', 
    
  }, { 
    path: '/reset-password', 
    component: ForgotPassword, 
    name: 'reset-password' 
  },
  { 
    path: '/reset-password/:token', 
    component: ResetPasswordForm, 
    name: 'reset-password-form' 
  },
  { 
    path: '/', 
    component: Home, 
    name: 'home' 
  },
  { 
    path: '/dashboard', 
    component: Dashboard, 
    name: 'dashboard', 
  },
]
