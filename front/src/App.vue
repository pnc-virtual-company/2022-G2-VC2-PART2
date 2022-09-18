<template>
  <section>
    <login-form v-if="my_role == 0"/>
    <coordinator-nav v-else-if="my_role == 1" @log_out="log_out"></coordinator-nav>
    <teachernav-nav v-else-if="my_role == 2" />
  </section>
</template>
<script>
import FormLogin from './components/login/FormLogin.vue'
import TeacherNav from './components/teachers/navbar/TeacherNavbar.vue'
import CoordinatorNav from './components/coordinators/navbar/CoordinatorNav.vue'
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
</style>
