import { createApp } from 'vue'
import App from './App.vue'
import AnimalButton from './components/AnimalButton.vue';

const app = createApp(App)
app.component('AnimalButton', AnimalButton);

app.mount('#app')

require('./bootstrap');
