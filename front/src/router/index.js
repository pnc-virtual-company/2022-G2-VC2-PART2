import { createRouter, createWebHistory } from 'vue-router'
import CoorTeacherList from '../views/CoordinatorView/CoorTeacherList.vue'
import CoorStudentList from '../views/CoordinatorView/CoorStudentList.vue'
import CoorStudentFollowingList from '../views/CoordinatorView/CoorStudentFollowingList.vue'

// Teacher Nabar---

import StudenFollowLists from '../views/TeacherNavView/StudentLists.vue';
import studetnFollowignUp from '../views/TeacherNavView/StudentFollowingUp.vue';
import studentFollowedUp from '../views/TeacherNavView/StudentFollowedUp.vue';


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

  
  // Teacher Navbar
  {
    path: '/StudenFollowLists',
    name: 'studentFollowLists',
    component: StudenFollowLists
  },
  {
    path: '/studentFollowingUp',
    name: 'studentFollowingUp',
    component: studetnFollowignUp
  },
  {
    path: '/studentFollowed',
    name: 'studentFollowed',
    component: studentFollowedUp
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
