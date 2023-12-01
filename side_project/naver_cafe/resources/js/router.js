import { createWebHistory, createRouter } from 'vue-router' // 중복할라면 {}열기
import MainComponents from '../components/main/MainComponents.vue';
import DetailComponents from '../components/DetailComponents.vue';
import LoginComponents from '../components/account/LoginComponents.vue';
import RegistComponents from '../components/account/RegistComponents.vue';

const routes = [ 
	{
		path: "/",
		redirect: "/cheers",
		// meta: {
		// 	roles: [] // 누구나 가능
		// },
	},
	{
		path: "/cheers",
		component: MainComponents,
		// meta: {
		// 	roles: [] // 누구나 가능
		// },
	},
	{
		path: "/detail",
		component: DetailComponents, // 디테일
		// meta: {
		// 	roles: [] // 카페 가입원만 가능
		// },
	},
	{
		path: "/login",
		component: LoginComponents, // 디테일
		// meta: {
		// 	roles: [] // 카페 가입원만 가능
		// },
	},
	{
		path: "/regist",
		component: RegistComponents, // 디테일
		// meta: {
		// 	roles: [] // 카페 가입원만 가능
		// },
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

// router.beforeEach((to, from, next) => {
	// let roleStatus = '..' // 권한 상태
	// if (to.meta.roles && !to.meta.roles.includes(roleStatus)) {
	//   alert('해당 페이지에 접근 권한이 없습니다.')
	//   next(from)
	// } else {
	//   next()
	// }
// });

export default router