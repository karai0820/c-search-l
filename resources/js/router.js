import Vue from 'vue';
import VueRouter from 'vue-router';
import Top from './components/top.vue';
import Search from './components/search.vue';
import List from './components/list.vue';
import Detail from './components/detail.vue';
import Create from './components/create.vue';
import Edit from './components/edit.vue';
import Registry from './components/registry.vue';



Vue.use(VueRouter);

const routes=[
	{ path: '/', component:Top, name: 'top' }, 
    { path: '/search', component:Search , name: 'search' }, 
    { path: '/list', component:List , name: 'list' }, 
    { path: '/list/:id', component:Detail , name: 'detail' }, 
    { path: '/create', component:Create, name: 'create' },
    { path: '/list/:id/edit', component:Edit, name: 'edit' },
    { path: '/list/:id/registry', component:Registry, name: 'registry' },
];

const router = new VueRouter({
	mode:'history',
	routes
});

export default router;


