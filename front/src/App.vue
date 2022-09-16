<template>
    <section>
      <coordinator-nav v-if="role"></coordinator-nav>
      <!-- <teachernav-nav/> -->
      <login-form v-else/>
    </section>
</template>
<script>
import FormLogin from './components/login/FormLogin.vue'
export default {
  data(){
    return {
      is_coordinator: false,
      is_teacher: false,
    }
  },
  components: {
        'login-form': FormLogin,
    },
    methods: {
        user_role() {
          var role = localStorage.getItem('role');
          if (role == '2'){
            this.is_coordinator = true;
          }else if (role == '1'){
            this.is_teacher = true;
          }
        },
    },
    computed: {
      role() {
        this.user_role();
        return this.is_coordinator;
      }
    }
}
</script>
<style>

</style>
