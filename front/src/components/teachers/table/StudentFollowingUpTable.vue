<template>
    <div>

      <form-messages v-if="showModal" :showModal="showModal"/>
      <table class="bg-white w-[82.6%] m-auto box-border mt-4">
        <thead class="text-white">
          <tr>
            <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
            <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
            <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
            <th class="lg:text-md text-md lg:p-3 bg-color">Totor</th>
            <th class="lg:text-md text-md lg:p-3 bg-color">Generation</th>
            <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="cursor-pointer show hover:bg-gray-200"
            v-for="student of students"
            :key="student"
          >
            <td class="border-b-2 py-1 lg:text-sm">
              <span class="flex justify-center"
                ><img :src="student.users.profile" class="w-10 h-10 rounded-full"
              /></span>
            </td>
            <td class="border-b-2 py-1 lg:text-sm">
              <span class="flex justify-center text-sm"
                >{{ student.users.first_name }} {{ student.users.last_name }}</span
              >
            </td>
            <td class="border-b-2 py-1 lg:text-sm">
              <span class="flex justify-center text-sm">{{
                student.users.email
              }}</span>
            </td>
            <td class="border-b-2 py-1 lg:text-sm">
              <span class="flex justify-center text-sm">{{
                student.tutor
              }}</span>
            </td>
            <td class="border-b-2 py-1 lg:text-sm">
              <span class="flex justify-center text-sm">{{
                student.generation
              }}</span>
            </td>
            <td class="border-b-2 py-1 lg:text-sm text-white">
              <span class="flex justify-center text-sm">
                <svg
                  class="h-8 w-8 text-blue-400"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                    @click="add_message(student.id)"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                  />
                </svg>
                <svg
                  @click="stopFollowUp(student.id)"
                  class="h-8 w-8 text-green-400"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                  <path d="M16 11l2 2l4 -4" />
                </svg>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</template>

<script>
import message_form from './MessageFroms.vue'
export default {
props:{
    students : Array,
},
components:{
  'form-messages':message_form
},
  data(){
    return{
         showModal: false,
    }
  },
  methods: {
    stopFollowUp(student_id){
      this.$emit('student_id',student_id);
    }, 
    add_message(){
      this.showModal = !this.showModal;
    }
  }
};
</script>

<style scoped>
.bg-color {
  background: #22bbea;
}
</style>
