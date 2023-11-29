import { createWebHistory, createRouter } from 'vue-router' // 중복할라면 {}열기
import ListComponents from '../components/ListComponents.vue';

const routes = [ 
	{
		path: "/",
		component: ListComponents,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router