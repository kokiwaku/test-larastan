import { createRouter, createWebHistory } from 'vue-router';
import PostList from '../components/PostList.vue';
import PostEdit from '../components/PostEdit.vue';

const routes = [
  {
    path: '/',
    name: 'postList',
    component: PostList,
  },
  {
    path: '/post',
    name: 'post',
    component: PostEdit,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;