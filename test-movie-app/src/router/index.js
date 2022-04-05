import { createRouter, createWebHistory } from 'vue-router'

import Home from '/src/components/Home.vue'
import Detail from '/src/components/Detail.vue'
import Anagram from '/src/components/Anagram.vue'

const routes = [
    { path: '/', name:'home', component: Home },
    { path: '/detail/:id', name:'detail', component: Detail },
    { path: '/anagram', name:'anagram', component: Anagram },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router