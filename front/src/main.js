import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import CoordinatorNav from './components/coordinator/navbarCoordinator/CoordinatorNav.vue'
import CoordinatorNavLogo from './components/coordinator/navbarCoordinator/CoordinatorNavLogo.vue'
import CoordinatorNavProfile from './components/coordinator/navbarCoordinator/CoordinatorNavProfile.vue'
import CoordinatorNavLogoutIcon from './components/coordinator/navbarCoordinator/CoordinatorNavLogoutIcon.vue'
import TeacherList from './components/coordinator/navbarCoordinator/teacher/TeacherView.vue'
import StudentList from './components/coordinator/navbarCoordinator/student/StudentView.vue'
const app = createApp(App)
app.component('coordinator-nav', CoordinatorNav)
app.component('coordinator-navlogo', CoordinatorNavLogo)
app.component('coordinator-navprofile', CoordinatorNavProfile)
app.component('coordinator-navLogoutIcon', CoordinatorNavLogoutIcon)
app.component('teacher-list', TeacherList)
app.component('student-list', StudentList)
app.use(router)
app.mount('#app')
