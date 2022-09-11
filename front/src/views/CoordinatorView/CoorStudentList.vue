<template>
  <section>
    <create-student></create-student>
    <student-list></student-list>
  </section>
</template>
<script>
import CreateStudent from '../../components/student/CreateStudent.vue'
export default {
  components: {
    'create-student': CreateStudent,
  },
}
</script>

<style></style>
