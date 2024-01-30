import { createApp } from 'vue';
import './bootstrap.js';
import Wrapper from './src/wrapper.vue';
import router from './src/routes/router';
// Import our custom CSS
import 'bootstrap/dist/css/bootstrap.min.css';

const app = createApp(Wrapper);

app.use(router);

app.mount('#app');
