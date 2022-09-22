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
      <tbody>
        <tr
          v-for="student of student_follow" :key="student"
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
              <move-out @click="move_from_follow(student.id, student.status)"/>
             
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
import Swal from "sweetalert2";
import MoveOut from "../icons/RemoveIcon.vue"
export default {
  components: {
  'move-out': MoveOut,
  },
  data() {
    return {
      student_follow: [],
      img_null:"https://icons.veryicon.com/png/o/education-technology/qiniu-cloud-service-icon/content-audit.png"
    };
  },

  methods: {
    get_student_follow() {
      axiosClient.get("students/get").then((res) => {
        this.student_follow = res.data.filter(
          (student) => student.status == true
        );
      });
    },

    move_from_follow(id, my_status) {
      let body = {};
      if (my_status == true) {
        body["status"] = false;
        Swal.fire({
          title: "Are you sure?",
          text: "You want to move student to follow up list!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#22BBEA",
          cancelButtonColor: "#FFAD5C",
          confirmButtonText: "Move From Follow-Up",
        }).then((result) => {
          if (result.isConfirmed) {
            axiosClient.put("teachers/update_status/" + id, body).then((res) => {
              console.log(res.data.student.id);
            });
            this.get_student_follow();
          }
        });
      }
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