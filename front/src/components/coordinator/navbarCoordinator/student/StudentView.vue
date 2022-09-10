<template>
    <table class="bg-white w-[80%] m-auto box-border mt-[25px]">
      <thead class="text-white">
          <tr>
              <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">First Name</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Last Name</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Batch</th>
              <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
          </tr>
      </thead>
      <ListView/>
    </table>
</template>
<script>
import ListView from './StudentList.vue'
export default {
  components: { ListView }
}
</script>
<style scoped>
.bg-color {
  background: #22BBEA;
}
</style>