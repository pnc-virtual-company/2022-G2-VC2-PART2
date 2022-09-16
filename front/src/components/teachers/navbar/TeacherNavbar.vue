<template>
  <div>
    <nav class="flex pl-4 pr-4 text-center w-full">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-20">
      </div>

      <div class="flex justify-center items-center w-full">
        <router-link class="px-3 py-2 rounded-md text-white text-xl mr-5 active" to="/teachers/student_list">All
          students</router-link>
        <router-link class="px-3 py-2 rounded-md text-white text-xl ml-5 active" to="/teachers/student_follow_up">Follow
          Up</router-link>
        <router-link class="px-3 py-2 rounded-md text-white text-xl ml-5 active" to="/teachers/student_history">History
        </router-link>
      </div>

      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="mr-8 w-12">
        <a href="log_out"><LogoutIcon @click="log_out" class="cusor-pointer mr-3"/></a>
      </div>
    </nav>
    <router-view />
  </div>
</template>

<script>
import LogoutIcon from '../../coordinators/icons/LogoutIcon.vue'
export default {
  components: {LogoutIcon},
  methods: {
    log_out() {
      localStorage.clear();
    }
  }
}
</script>


<style>
nav {
  background-color: #22BBEA;
}

nav a.router-link-exact-active.active {
  background-color: #FFAD5C;
}
</style>