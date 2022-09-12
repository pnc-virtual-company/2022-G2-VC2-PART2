<template>
  <!-- <Students/> -->
  <create-student></create-student>
  <student-view/>
</template>

<script>
import CreateStudent from '@/components/coordinator/student/CreateStudent.vue'
import StudentView from '@/components/coordinator/student/StudentView'
export default {

  components:{
    'create-student': CreateStudent,
    'student-view': StudentView
  }
}
</script>

<style>

</style>