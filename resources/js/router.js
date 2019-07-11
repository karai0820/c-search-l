import Vue from 'vue';
import VueRouter from 'vue-router';
import Top from './components/top.vue';
import List from './components/list.vue';
import Search from './components/search.vue';
import Detail from './components/detail.vue';
import Create from './components/create.vue';

Vue.use(VueRouter);

const routes=[
	{ path: '/', component:Top, name: 'top' }, 
    { path: '/search', component:Search , name: 'search' }, 
    { path: '/list', component:List, name: 'list' }, 
    { path: '/list/:id', component:Detail, name: 'detail' }, 
    { path: '/create', component:Create, name: 'create' },
];

const router = new VueRouter({
	mode:'history',
	routes
});

export default router;


