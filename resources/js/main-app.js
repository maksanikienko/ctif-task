import './bootstrap';
import './jquery-2.1.4.min';
import './../css/select2.css';
import './select2.min';
import './../css/styles.css';

import {createApp} from 'vue';
import AppComponent from './components/AppComponent.vue';
import IbanFormComponent from "./components/IbanFormComponent.vue";
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
import LoginComponent from "./components/Auth/Login.vue";

import router from './routes';


/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
createApp(LoginComponent).use(router).mount('#login')

createApp(AppComponent).mount("#app");
createApp(IbanFormComponent).mount('#iban')
createApp(HeaderComponent).mount('#header')
createApp(FooterComponent).mount('#footer')


