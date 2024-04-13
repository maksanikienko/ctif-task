import './bootstrap';
import './../css/styles.css';
import './../css/select2.css';

import './jquery-2.1.4.min';
import './select2.min';

import {createApp} from 'vue';
import AppComponent from './components/AppComponent.vue';
import IbanFormComponent from "./components/IbanFormComponent.vue";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

createApp(AppComponent).mount("#app");
createApp(IbanFormComponent).mount('#iban')


