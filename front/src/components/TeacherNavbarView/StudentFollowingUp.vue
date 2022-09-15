<template>
  <div class="student-following-up">
    <student-table :students="data"></student-table>
  </div>
</template>

<script>
import StudentFollowingTable from './table/StudentFollowingUpTable.vue';


export default {
components: {
  'student-table' : StudentFollowingTable,
},
data(){
  return{
  }
},

}
</script>

<style>

</style>