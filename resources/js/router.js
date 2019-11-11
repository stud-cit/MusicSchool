import Vue from 'vue'
import Router from 'vue-router'
import HomeComponent from './components/Home/HomeComponent'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeComponent
    }
  ]
})
