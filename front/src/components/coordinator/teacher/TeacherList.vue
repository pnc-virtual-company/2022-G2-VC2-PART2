<template>
  <div class="teacher_list">
    <!---------------------------------table-view-teacher------------------------->
    <create_teacher @add-teacher="create_teacher"></create_teacher>
    <table class="bg-white w-[82.6%] m-auto box-border mt-4">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Position</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="cursor-pointer show hover:bg-gray-200"
          v-for="teacher of teacher_lists"
          :key="teacher"
        >
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center"
              ><img :src="teacher.users.profile" class="h-10 w-10 rounded-full"
            /></span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm"
              >{{ teacher.users.first_name }}
              {{ teacher.users.last_name }}</span
            >
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              teacher.users.gender
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              teacher.position
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
              <icon-detail />
              <icon-edit />
              <icon-delete @click="delete_teacher(teacher.users.id)" />
            </span>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-center mt-[50px]">
      <div v-if="teacher_lists.length == 0">
        <img :src="img_null" class="flex justify-center m-auto w-40" />
        <h1 class="text-red-500 text-center text-2xl mt-2">
          No Teacher in list
        </h1>
      </div>
    </div>
    <!-------------------------------------end-view-------------------------------->
  </div>
</template>
<script>
import axiosClient from "../../../axios-http";
import Swal from "sweetalert2";
import CreateTeacher from "./TeacherView.vue";
export default {
  components: { create_teacher: CreateTeacher },
  data() {
    return {
      teacher_lists: [],
      img_null:
        "https://icons.veryicon.com/png/o/education-technology/qiniu-cloud-service-icon/content-audit.png",
    };
  },
  methods: {
    get_teachers() {
      axiosClient.get("teachers/get").then((res) => {
        this.teacher_lists = res.data;
      });
    },
    create_teacher(teacher) {
      axiosClient.post("teachers/create", teacher);
      this.get_teachers();
    },

    delete_teacher(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You want to delete teacher!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#22BBEA",
        cancelButtonColor: "#FFAD5C",
        confirmButtonText: "Yes, delete!",
      }).then((result) => {
        if (result.isConfirmed) {
          axiosClient.delete("teachers/delete/" + id);
          this.get_teachers();
        }
      });
    },
  },
  mounted() {
    this.get_teachers();
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