<template>
  <section>
    <login-form v-if="my_role == 0"/>
    <coordinator-nav v-else-if="my_role == 1" @log_out="log_out"></coordinator-nav>
    <teachernav-nav v-else-if="my_role == 2" />
    <!-- <ForgotPassword/> -->
    <!-- <FormConfirm/> -->
    <student-Nabar v-else-if="my_role == 3"/>
  </section>
</template>
<script>
import FormLogin from './components/login/FormLogin.vue'
import TeacherNav from './components/teachers/navbar/TeacherNavbar.vue'
import CoordinatorNav from './components/coordinators/navbar/CoordinatorNav.vue'
<<<<<<< HEAD
// import ForgotPassword from './components/login/ForgotPassword.vue'
// import FormConfirm from './components/login/FormConfirm.vue'
import StudentNav from './components/students/navbar/StudentNavbar.vue';
=======
// import StudentNav from './components/students/navbar/StudentNavbar.vue';
>>>>>>> d583b995a649294d0be4b385753fee3502f74a94
export default {
  data() {
    return {
      role: '',
    }
  },
  components: {
    "login-form": FormLogin,
    "teachernav-nav": TeacherNav,
    "coordinator-nav": CoordinatorNav,
    // ForgotPassword,
    // FormConfirm,
    "student-Nabar":StudentNav
},
  methods: {
    user_role() {
      var role = localStorage.getItem('role');
      if (role == '2') {
        this.role = 2;
      } else if (role == '1') {
        this.role = 1;
      }else if (role == '3'){
        this.role = 3;
      }else {
        this.role = 0;
      }
    },
  },
  computed: {
    my_role() {
      this.user_role();
      return this.role;
    },
  }
}
</script>
<style>
  body{
    background-color: rgb(209 213 219);
  }
</style>
