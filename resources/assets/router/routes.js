import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export const constantRouterMap = [
    {
        name: '个人中心',
        path: '/',
        component: require('../views/Index'),
    },
    {
        name: '用户管理',
        path: '/user',
        component: require('../components/CkBody'),
        children: [
            {
                name: '用户列表',
                path: 'index',
                component: require('../views/user/Index'),
            },
            {
                name: '修改用户',
                path: 'edit/:user_id',
                component: require('../views/user/Edit'),
                display: false,
            },
        ]
    },
    {
        name: '文件管理',
        path: '/file',
        component: require('../components/CkBody'),
        children: [
            {
                name: '单个图片上传',
                path: 'image-single',
                component: require('../views/file/image'),
            },
        ]
    },
    {
        name: '角色管理',
        path: '/role',
        component: require('../components/CkBody'),
        children: [
            {
                name: '角色列表',
                path: 'index',
                component: require('../views/role/Index')
            },
            {
                name: '添加角色',
                path: 'add',
                component: require('../views/role/Add')
            }
        ]
    }
    ]

export default new Router({
    // mode: 'history', // require service support
    scrollBehavior: () => ({ y: 0 }),
    routes: constantRouterMap
})