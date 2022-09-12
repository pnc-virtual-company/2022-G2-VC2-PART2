<template>
  <teacher-view></teacher-view>
  <teacher-list></teacher-list>
</template>

<script>
import TeacherViewVue from '@/components/coordinator/teacher/TeacherView.vue';
import ListView from '@/components/coordinator/teacher/ListView.vue'
export default {
  components:{ 
    'teacher-view':TeacherViewVue,
    'teacher-list': ListView,
  }
}
</script>

<style>

</style>