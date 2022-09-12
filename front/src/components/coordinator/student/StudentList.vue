<template>
  <!---------------------------------table-view-teacher------------------------->
  <tbody>
    <tr
      class="cursor-pointer show hover:bg-gray-200"
      v-for="student of student_lists"
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
          student.users.gender
        }}</span>
      </td>
      <td class="border-b-2 py-1 lg:text-sm">
        <span class="flex justify-center text-sm">{{ student.batch }}</span>
      </td>
      <td class="border-b-2 py-1 lg:text-sm text-white">
        <span class="flex justify-center space-x-2 icons">
          <icon-detail />
          <icon-edit v-on:click="toggleModal(student.users.id)" />
          <icon-delete @click="deleteStudent(student.users.id)" />
        </span>
      </td>
    </tr>
    <div
      v-if="showModal"
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
      <div class="form-container shadow-md rounded w-2/5">
        <h2 class="header text-center text-white py-3">Edit Student Account</h2>
        <form-edit-student
          @isShow="onChange"
          :student_id="student_id" @edit-student="edit_student"
        ></form-edit-student>
      </div>
    </div>
    <div v-if="showModal" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
  </tbody>
  <!-------------------------------------end-view-------------------------------->
</template>
<script>
import axiosClient from "../../../axios-http";
import Swal from "sweetalert2";
import FormEdit from "./FormEdit.vue";
export default {
  components: {
    "form-edit-student": FormEdit,
  },
  data() {
    return {
      student_lists: [],
      showModal: false,
      student_id: "",
    };
  },
  methods: {
    get_students() {
      axiosClient.get("students").then((res) => {
        this.student_lists = res.data;
      });
    },
    toggleModal: function (id) {
      this.showModal = !this.showModal;
      this.student_id = id;
    },
    onChange(isShow) {
      this.showModal = isShow;
    },
    deleteStudent(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You want to delete student!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#22BBEA",
        cancelButtonColor: "#FFAD5C",
        confirmButtonText: "Yes, delete!",
      }).then((result) => {
        if (result.isConfirmed) {
          axiosClient.delete("students/" + id);
          this.get_students();
        }
      });
    },
    edit_student(new_student,id) {
      axiosClient.put("student_update/" + id, new_student)
      this.get_students();
    },
  },
  computed: {
    student_data() {
      return this.student_lists;
    },
  },
  mounted() {
    this.get_students();
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
.btn-add {
  background: #22bbea;
}
.header {
  background: #22bbea;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  font-weight: bold;
  font-size: 20px;
}
.form-container {
  background: #bbd7e0;
}
</style>
