import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

//import bootstrap css & js
import 'bootstrap/dist/css/bootstrap.css'
import 'jquery/dist/jquery.min'
import 'popper.js/dist/popper.min'
import 'bootstrap/dist/js/bootstrap.min'

//import vue router
import VueRouter from 'vue-router'

Vue.use(VueRouter);

//import component
import PostIndex from './components/posts/Index'
import PostDetail from './components/posts/Detail'
import PostCreate from './components/posts/Create'
import PostEdit from './components/posts/Edit'

// import KategoriIndex from './components/kategories/Index'
// import KategoriCreate from './components/kategories/Create'
// import KategoriEdit from './components/kategories/Edit'

const router = new VueRouter({
  routes: [{
      path: '/',
      name: 'posts',
      component: PostIndex
    },
    {
      path: '/create',
      name: '/create',
      component: PostCreate
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: PostEdit
    },
    {
      path: '/detail/:id',
      name: 'detail',
      component: PostDetail
    }
    // {
    //   path: '/kategories',
    //   name: 'kategories',
    //   component: KategoriIndex
    // },
    // {
    //   path: '/create/kategories',
    //   name: '/create/kategories',
    //   component: KategoriCreate
    // },
    // {
    //   path: '/edit/kategories/:id',
    //   name: 'edit/kategori',
    //   component: KategoriEdit
    // },

  ],
  mode: 'history'
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')