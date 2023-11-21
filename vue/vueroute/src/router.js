import { createWebHistory, createRouter } from 'vue-router' // 중복할라면 {}열기
import List from './components/List.vue';
import Add from './components/Add.vue';
import Edit from './components/Edit.vue';

const routes = [ //이름도 규칙
	{
		path: "/",
		redirect: '/list',
	},
	{
		path: "/list",
		component: List,
	},
	{
		path: "/add",
		component: Add,
	},
	{
		path: "/edit",
		component: Edit,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;