<template>
  <section>
    <!-- <FormUpdatePassword></FormUpdatePassword> -->
    <login-form v-if="my_role == 0" />
    <coordinator-nav v-else-if="my_role == 1" @logout="log_out"></coordinator-nav>
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
import CryptoJS from 'crypto-js';
import { useUserStore } from "./store/index"
// import FormUpdatePassword from './components/login/FormUpdatePassword.vue'
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
    // FormUpdatePassword,
  },
  methods: {
    decrypt_token() {
      var cookiesToken = this.$cookies.get('token');
      if (cookiesToken != null) {
        var encryptedToken = CryptoJS.AES.decrypt(cookiesToken, 'user_token');
        var oringinToken = encryptedToken.toString(CryptoJS.enc.Utf8);
        return oringinToken;
      }
    },
    get_token() {
      const user = useUserStore();
      user.get_token(this.decrypt_token());
    },
    user_role() {
      let cookiesRole = this.$cookies.get('role');
      if (cookiesRole != null) {
        var encryptedRole = CryptoJS.AES.decrypt(cookiesRole, 'user_role');
        var oringinRole = encryptedRole.toString(CryptoJS.enc.Utf8);
        var role = oringinRole;

        if (role == '2') {
          this.role = 2;
        } else if (role == '1') {
          this.role = 1;
        } else if (role == '3') {
          this.role = 3;
        } else {
          this.role = 0;
        }
      }
    },
    log_out(role) {
      this.role = role;
      console.log(role);
    }
  },
  computed: {
    my_role() {
      this.user_role();
      return this.role;
    },
  },
  mounted() {
    this.get_token();
  }
}
</script>
<style>
body {
  background-color: rgb(209 213 219);
}

</style>
