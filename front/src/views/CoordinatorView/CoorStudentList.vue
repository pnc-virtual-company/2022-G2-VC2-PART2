<template>
  <create-student></create-student>
  <student-view/>
</template>
<script>
import CreateStudent from '@/components/coordinator/student/CreateStudent.vue'
export default {
  components: {
    'create-student': CreateStudent,
  },
}
</script>

<style></style>
