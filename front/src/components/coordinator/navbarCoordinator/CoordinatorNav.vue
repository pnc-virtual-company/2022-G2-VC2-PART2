<template>
  <nav class="flex pl-4 pr-4 text-center w-full">
    <div class="flex items-center">
      <coordinator-navlogo class="mt-1"/>
    </div>
    
    <div class="flex justify-center items-center w-full">
      <router-link class="px-3 py-2 rounded-md text-white text-xl mr-5 active" to="/">Teacher List</router-link>
      <router-link class="px-3 py-2 rounded-md text-white text-xl ml-5 active" to="/studentList">Student List</router-link>
    </div>

    <div class="flex items-center">
      <coordinator-navprofile class="mt-1 mr-10"/>
      <coordinator-navLogoutIcon class="mt-1"/>
    </div>
  </nav>
  <router-view/>
</template>

<script>
export default {

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