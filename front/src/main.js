import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import CoordinatorNav from './components/coordinator/navbarCoordinator/CoordinatorNav.vue'
import CoordinatorNavLogo from './components/coordinator/navbarCoordinator/CoordinatorNavLogo.vue'
import CoordinatorNavProfile from './components/coordinator/navbarCoordinator/CoordinatorNavProfile.vue'
import CoordinatorNavLogoutIcon from './components/coordinator/navbarCoordinator/CoordinatorNavLogoutIcon.vue'
import ListView from '@/components/coordinator/teacher/ListView.vue'
import StudentView from '@/components/coordinator/student/StudentView.vue'
// icons---------------------------------------------------------------------
import IconDetail from '@/components/coordinator/icons/DetailView.vue'
import IconEdit from '@/components/coordinator/icons/EditView.vue'
import IconDelete from '@/components/coordinator/icons/RemoveView.vue'
// end-icons-----------------------------------------------------------------
const app = createApp(App)
app.component('coordinator-nav', CoordinatorNav)
app.component('coordinator-navlogo', CoordinatorNavLogo)
app.component('coordinator-navprofile', CoordinatorNavProfile)
app.component('coordinator-navLogoutIcon', CoordinatorNavLogoutIcon)
app.component('list-view', ListView)
app.component('student-view', StudentView)
app.component('icon-detail', IconDetail)
app.component('icon-edit', IconEdit)
app.component('icon-delete', IconDelete)
app.use(router)
app.mount('#app')
