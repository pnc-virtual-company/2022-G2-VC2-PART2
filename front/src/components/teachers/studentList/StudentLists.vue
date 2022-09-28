<template>
  <section>
    <student-list class="mt-[5rem]" />
  </section>
</template>
<script>
import StudentFollowList from "../table/StudentFollowList.vue";
export default {
  components: {
    "student-list": StudentFollowList,
  },
};
</script>

<style scoped></style>
