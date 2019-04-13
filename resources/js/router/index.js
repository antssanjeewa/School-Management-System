
import Vue from 'vue'
import Router from 'vue-router' 

import Admin from '../components/ControlPanel/DashBoard'
import Childrens from '../components/ControlPanel/Childrens'
import ChildRegister from '../components/ControlPanel/Childrens/Register.vue'

import User from '../components/User'


Vue.use(Router)

const routes = [
    { path: '/', component: Admin},
    { path: '/users', component: User},
    { path: '/childs', component: Childrens},
    { path: '/childs/add', component: ChildRegister},
    
]

export default new Router({
    // mode: 'history',
    routes
})