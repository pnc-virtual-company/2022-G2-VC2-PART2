<template>
  <nav class="flex pl-4 pr-4 text-center w-full">
    <div class="flex items-center">
      <coordinator-navlogo/>
    </div>
    
    <div class="flex justify-center items-center w-full">
      <router-link class="px-3 py-2 rounded-md text-white text-xl active" to="/teacherList">Teacher List</router-link>
      <router-link class="px-3 py-2 rounded-md text-white text-xl active" to="/studentList">Student List</router-link>
      <router-link class="px-3 py-2 rounded-md text-white text-xl active" to="/studentFollowing">Student Follow-Up</router-link>
    </div>

    <div class="flex items-center">
      <coordinator-navprofile class=" mr-10"/>
      <a href=""><coordinator-navLogoutIcon @click="log_out" class="cusor-pointer"/></a>
    </div>
  </nav>
  <router-view/>
</template>

<script>
export default {
  methods: {
    log_out(){
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