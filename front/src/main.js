import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
// .........................................
import CoordinatorNav from './components/coordinator/navbarCoordinator/CoordinatorNav.vue'
import CoordinatorNavLogo from './components/coordinator/navbarCoordinator/CoordinatorNavLogo.vue'
import CoordinatorNavProfile from './components/coordinator/navbarCoordinator/CoordinatorNavProfile.vue'
import CoordinatorNavLogoutIcon from './components/coordinator/navbarCoordinator/CoordinatorNavLogoutIcon.vue'
import StudentFollowUped from './components/coordinator/student/StudentFollowUped.vue'
// icons---------------------------------------------------------------------
import IconDetail from '@/components/coordinator/icons/DetailView.vue'
import IconEdit from '@/components/coordinator/icons/EditView.vue'
import IconDelete from '@/components/coordinator/icons/RemoveView.vue'
/* import the fontawesome core */


const app = createApp(App)
app.component('coordinator-nav', CoordinatorNav)
app.component('coordinator-navlogo', CoordinatorNavLogo)
app.component('coordinator-navprofile', CoordinatorNavProfile)
app.component('coordinator-navLogoutIcon', CoordinatorNavLogoutIcon)
app.component('studentFollowUpd',StudentFollowUped)
app.component('icon-detail', IconDetail)
app.component('icon-edit', IconEdit)
app.component('icon-delete', IconDelete)
app.use(router)
app.mount('#app')
