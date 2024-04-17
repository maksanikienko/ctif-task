import './../css/bootstrap.css';
import './../css/bootstrap.min.css';

import { createApp } from 'vue';
import AdminComponent from './components/Admin/AdminComponent.vue';
import router from './routes';

createApp(AdminComponent).use(router).mount('#admin');
