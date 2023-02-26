import './bootstrap';
import './playing';
import './sidebar';
import './swiper';
import './like';
import './barba';
import './range';

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import { createApp } from 'vue';
import SongLikeComponent from './components/SongLikeComponent.vue';
import FollowComponent from './components/FollowComponent.vue';

const app = createApp();
const follow = createApp();
console.log(app.version);
app.component('song-like-component', SongLikeComponent);
follow.component('follow-component', FollowComponent);
app.mount('.Liken');
follow.mount('.follow');