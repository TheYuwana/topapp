import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './views/Home'
import FizzBuzz from "./views/FizzBuzz";
import Reversal from "./views/Reversal";
import ResetPassword from "./views/ResetPassword";
import RotatingArray from "./views/RotatingArray";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/playground/fizzbuzz',
        name: 'FizzBuzz',
        component: FizzBuzz
    },
    {
        path: '/playground/reversal',
        name: 'Reversal',
        component: Reversal
    },
    {
        path: '/playground/reset-password',
        name: 'ResetPassword',
        component: ResetPassword
    },
    {
        path: '/playground/rotating-array',
        name: 'RotatingArray',
        component: RotatingArray
    }
]

export default new VueRouter({
    mode: "history",
    routes
});
