<template>
  <CardSlot>
    <table class="bg-white w-[96%] m-auto box-border">
      <thead>
          <tr>
              <th class="lg:text-md text-sm lg:p-5 p-0 bg-blue-300">Profile</th>
              <th class="lg:text-md text-sm lg:p-5 p-0 bg-blue-300">First Name</th>
              <th class="lg:text-md text-sm lg:p-5 p-0 bg-blue-300">Last Name</th>
              <th class="lg:text-md text-sm lg:p-5 p-0 bg-blue-300">Position</th>
              <th class="lg:text-md text-sm lg:p-5 p-0 bg-blue-300">Actions</th>
          </tr>
      </thead>
      <ListView/>
      <!-- <CardDetail v-for="student of filterByName" :key="student" :data="student" @remove-list="removeListStudent"></CardDetail> -->
    </table>
  </CardSlot>
</template>
<script>
import ListView from './TeacherList.vue'
import CardSlot from '../Slot/CardSlot.vue'
export default {
  components: { CardSlot, ListView }
}
</script>
