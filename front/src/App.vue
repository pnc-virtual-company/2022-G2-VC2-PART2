<template>
  <section>
    <login-form v-if="my_role == 0"/>
    <coordinator-nav v-else-if="my_role == 1" @log_out="log_out"></coordinator-nav>
    <teachernav-nav v-else-if="my_role == 2" />
    <!-- <student-nav v-else-if="my_role == 3"/> -->

  </section>
</template>
<script>
import FormLogin from './components/login/FormLogin.vue'
import TeacherNav from './components/teachers/navbar/TeacherNavbar.vue'
import CoordinatorNav from './components/coordinators/navbar/CoordinatorNav.vue'
// import StudentNav from './views/StudentView/StudentInfoView.vue'
export default {
  data() {
    return {
      role: ''
    }
  },
  components: {
    'login-form': FormLogin,
    'teachernav-nav': TeacherNav,
    'coordinator-nav': CoordinatorNav,
    // 'student-nav':StudentNav
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
