<template>
  <!-- <Students/> -->
  <div class="student-view container w-10/12 m-auto">
    <student-view/>
  </div>
</template>

<script>
import ListView from '../../components/coordinator/student/StudentList.vue'
export default {

  components:{
    'student-view': ListView
  }
}
</script>

<style>

</style>