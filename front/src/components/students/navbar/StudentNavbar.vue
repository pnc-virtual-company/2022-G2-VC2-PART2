<template>
  <nav class="relative flex flex-wrap items-center justify-between bg-sky-500">
      <nav class="flex pl-4 pr-4 text-center w-full justify-between">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-20">
      </div>
      
      <div  class="flex items-center text-white">
        <img src="../../../assets/Narong.png" class="w-10 py-2 mr-3">
        <a href="log_out"
          ><Logout @click="log_out" class="cusor-pointer ml-3 mr-3"
        /></a>
      </div>
    </nav>
  </nav>
</template>
<script>
  import Logout from '../../coordinators/icons/LogoutIcon.vue';
export default {
  components:{
    Logout

  },

  data(){
    return{

    }
  },
  methods:{
    log_out(){
      localStorage.clear();
    }
  }
};
</script>

<style>
</style>