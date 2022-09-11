import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import Vuelidate from 'vuelidate'
import CoordinatorNav from './components/coordinator/navbarCoordinator/CoordinatorNav.vue'
import CoordinatorNavLogo from './components/coordinator/navbarCoordinator/CoordinatorNavLogo.vue'
import CoordinatorNavProfile from './components/coordinator/navbarCoordinator/CoordinatorNavProfile.vue'
import CoordinatorNavLogoutIcon from './components/coordinator/navbarCoordinator/CoordinatorNavLogoutIcon.vue'
import TeacherView from './components/coordinator/navbarCoordinator/teacher/TeacherView.vue'
import StudentView from './components/coordinator/navbarCoordinator/student/StudentView.vue'

const app = createApp(App)
app.component('coordinator-nav', CoordinatorNav)
app.component('coordinator-navlogo', CoordinatorNavLogo)
app.component('coordinator-navprofile', CoordinatorNavProfile)
app.component('coordinator-navLogoutIcon', CoordinatorNavLogoutIcon)
app.component('teacher-view', TeacherView)
app.component('student-view', StudentView)
app.use(router)
app.use(Vuelidate)
app.mount('#app')
