<template>
  <div class="student">
    <table class="bg-white w-[82.6%] m-auto box-border mt-4">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Generation</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>
      <tbody  v-for="student of student_follow" :key="student">
        <tr
          v-if="student.status == false" :style="{backgroundColor :'#a6ddee'}"
          class="cursor-pointer show hover:bg-gray-200"
        >
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center"
              ><img :src="student.users.profile" class="w-10 h-10 rounded-full"
            /></span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm"
              >{{ student.users.first_name }}
              {{ student.users.last_name }}</span
            >
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">
              {{ student.users.gender }}</span
            >
          </td>

          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.users.email
            }}</span>
          </td>

          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.generation
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
              <remove-stu-follow @click="move_from_follow(student.id, student.status)" />
            </span>
          </td>
        </tr>

        <tr
          v-if="student.status == true" :style="{backgroundColor :'#ffffff'}"
          class="cursor-pointer show hover:bg-gray-200"
        >
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center"
              ><img :src="student.users.profile" class="w-10 h-10 rounded-full"
            /></span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm"
              >{{ student.users.first_name }}
              {{ student.users.last_name }}</span
            >
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">
              {{ student.users.gender }}</span
            >
          </td>

          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.users.email
            }}</span>
          </td>

          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.generation
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
              <remove-stu-follow/>
            </span>
          </td>
        </tr>

        <div
          v-if="showModal"
          class="
            overflow-x-hidden overflow-y-auto
            fixed
            inset-0
            z-50
            outline-none
            focus:outline-none
            justify-center
            items-center
            flex
          "
        >
          <div class="form-container shadow-md rounded w-2/5">
            <h2 class="header text-center text-white py-3">
              Edit Student Account
            </h2>
          </div>
        </div>
        <div
          v-if="showModal"
          class="opacity-30 fixed inset-0 z-40 bg-black"
        ></div>
      </tbody>
    </table>
    <div class="flex justify-center mt-[50px]">
      <div v-if="student_follow.length == 0">
        <img :src="img_null" class="flex justify-center m-auto w-40" />
        <h1 class="text-red-500 text-center text-2xl mt-2">
          No Student in list
        </h1>
      </div>
    </div>
  </div>
</template>
<script>
import axiosClient from "../../../axios-http";
import moveStu from "../icons/MoveStudent.vue";
export default {
  components: {
    "remove-stu-follow": moveStu,
  },
  data() {
    return {
      student_follow: [],
      student_list: [],
    };
  },

  methods: {
    get_student_follow() {
      axiosClient.get("students").then((res) => {
        this.student_follow = res.data.filter(
          (student) => student.status == true
        );
      });
    },
    
  },

  mounted() {
    this.get_student_follow();
  },
};
</script>

<style scoped>
.icons {
  display: none;
}
.show:hover .icons {
  display: flex;
  margin: 0 -10px;
  padding: 0;
}

.bg-color {
  background: #22bbea;
}

</style>