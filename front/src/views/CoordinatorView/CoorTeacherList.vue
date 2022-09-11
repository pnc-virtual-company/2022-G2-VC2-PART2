<template>
<section>
  <teacher-view></teacher-view>
  <teacher-list></teacher-list>

</section>

</template>
<script>
  import TeacherView from '../../components/teacher/TeacherView.vue'
export default {
components:{
  "teacher-view" : TeacherView,
}
}
</script>
