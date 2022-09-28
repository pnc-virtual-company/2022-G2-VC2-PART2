import { createRouter, createWebHistory } from 'vue-router'
import CoorTeacherList from '../views/CoordinatorView/TeacherList.vue'
import CoorStudentList from '../views/CoordinatorView/StudentList.vue'
import CoorStudentFollowingList from '../views/CoordinatorView/StudentFollowUp.vue'

// Teachers view
import StudentFollowUpTeacherView from '../views/TeacherView/StudentFollowUpView.vue'
import AllStudentTeachersView from '../views/TeacherView/StudentListView.vue'
// User Login
import UserLogin from '../components/login/FormLogin.vue'
const routes = [

  // Coordinator routes
  {
    path: '/users/login',
    name: 'login',
    component: UserLogin
  },
  {
    path: '/coordinator/teacher_list',
    name: 'teacher_list',
    component: CoorTeacherList
  },
  {
    path: '/coordinator/student_list',
    name: 'all-student',
    component: CoorStudentList
  },
  {
    path: '/coordinator/student_follow_up',
    name: 'studentFollowingList',
    component: CoorStudentFollowingList
  },

  // Teacher routes
  {
    path: '/teachers/student_list',
    name: 'student_list',
    component: AllStudentTeachersView
  },
  {
    path: '/teachers/student_follow_up',
    name: 'student_follow_up',
    component: StudentFollowUpTeacherView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
