import { createWebHistory, createRouter } from 'vue-router' // 중복할라면 {}열기

const routes = [ //이름도 규칙
	{
		path: "/",
		redirect: '/login',
	},
	{
		path: "/login",
		component: LoginComponent,
	},
	{
		path: "/board",
		component: BoardComponent,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;