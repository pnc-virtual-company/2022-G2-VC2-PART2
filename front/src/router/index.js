import { createRouter, createWebHistory } from 'vue-router'
import CoorTeacherList from '../views/CoordinatorView/CoorTeacherList.vue'
import CoorStudentList from '../views/CoordinatorView/CoorStudentList.vue'
import CoorStudentFollowingList from '../views/CoordinatorView/CoorStudentFollowingList.vue'
// import FormLogin from '../components/login/FormLogin.vue'
const routes = [
  {
    path: '/teacherList',
    name: 'teacherList',
    component: CoorTeacherList
  },

  {
    path: '/studentList',
    name: 'studentList',
    component: CoorStudentList
  },
  {
    path: '/studentFollowing',
    name: 'studentFollowingList',
    component: CoorStudentFollowingList
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
