
import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});
/* 
    " Vite では require は使用不可 "
    window.Vue = require('vue'); 
*/

import { createRouter, createWebHistory } from 'vue-router';
import HeaderComponent from './components/HeaderComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import TaskListComponent from './components/TaskListComponent.vue';

const App = new createApp({
    el: '#app',
    
});

const router = new createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/tasks',
            name: 'task.list',
            component: TaskListComponent
        },
    ]
});

export default router;

app.component('example-component', ExampleComponent);
app.component('header-component', HeaderComponent);
app.component('tasklist-component', TaskListComponent);

createApp(App).use(router).mount("#app");
