import { createApp } from 'vue';
import Wrapper from './src/wrapper.vue';
import router from './src/routes/router';

const app = createApp(Wrapper);

app.use(router);

app.mount('#app');
