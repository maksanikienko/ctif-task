import { createMemoryHistory, createRouter} from 'vue-router';
import Login from './components/Auth/Login.vue';

export const router = createRouter({
    history: createMemoryHistory(),
    routes: [
        { path: '/auth/login', component: Login, name: 'auth.login'},

        { name: 'home', path: '/', component: () => import('./components/Admin/AdminComponent.vue'), props: true  },
        { name: 'user-list', path: '/user-list', component: () => import('./components/Admin/UserListComponent.vue') },
        { name: 'create-user', path: '/create', component: () => import('./components/Admin/CreateUserComponent.vue') },

        { name: 'edit', path: '/edit/:id', component: () => import('./components/Admin/EditUserComponent.vue'),  props: true }
    ],
})


export default router;
