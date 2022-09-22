<template>
  <nav class="relative flex flex-wrap items-center justify-between bg-sky-500">
      <nav class="flex pl-4 pr-4 text-center w-full justify-between">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-20">
      </div>
      
      <div id="none" class="flex items-center text-white">
        <img v-on:click="toggleModal()" src="../../../assets/Narong.png" class="w-10 py-2 mr-3">
        <detail-account class="details"/>
        <a href="log_out"
          ><Logout @click="log_out" class="cusor-pointer ml-3 mr-3"
        /></a>
      </div>
    </nav>
  </nav>
  <StudentContent/>
</template>
<script>
  import Logout from '../../coordinators/icons/LogoutIcon.vue';
  import StudentContent from '../studentView/AllTeachersPlaceComment.vue';
  import DetailAccount from '../studentView/StudentDetailAccountview.vue'
export default {
  components:{
    Logout,
    StudentContent,
    "detail-account":DetailAccount

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

<style scoped>
  .details{
    display: flex;
    position: absolute;
    padding: 8px 8px;
    margin: 4px 3px;
    border-radius: 10px;
  }

</style>