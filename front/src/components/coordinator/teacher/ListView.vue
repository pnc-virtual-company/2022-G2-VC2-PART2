<template>
    <table class="bg-white w-[80%] m-auto box-border mt-[25px]">
      <thead class="text-white">
          <tr>
              <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Position</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
          </tr>
      </thead>
      <ListView/>
    </table>
</template>
<script>
import ListView from './TeacherList.vue'
export default {
  components: { ListView }
}
</script>

<style scoped>
.bg-color {
  background: #22BBEA;
}
</style>