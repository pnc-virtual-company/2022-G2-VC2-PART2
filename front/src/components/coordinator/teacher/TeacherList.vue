<template>
  <div class="teacher_list">
    <!---------------------------------card-detail-------------------------------->
    <div class="modal-mask" v-if="show_detail == true">
      <div class="modal-wrapper">
          <div class="flex items-start justify-center py-2 rounded-t header bg-blue-300">
            <h2 class="flex justify-center w-full text-white text-xl">Teacher Detail</h2>
            <svg @click="togle" class="h-6 w-6 text-red-500 m-auto mr-2 cursor-pointer"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
          </div>
          <div class="modal-container bg-white">
              <div class="flex space-x-[50px]" v-for="teacher of teacher_lists" :key="teacher">
                  <div class="ml-[50px]">
                      <img :src="teacher.users.profile" width="126" class="mt-5 rounded-full">
                      <p class="text-center text-xl font-bold mb-5">{{teacher.users.first_name}} {{teacher.users.last_name}}</p>
                  </div>
                  <div class="mt-[18px] leading-loose">
                      <p>Gender: {{teacher.users.gender}}</p>
                      <p>Position: {{teacher.position}}</p>
                      <p>Role: {{teacher.users.role}}</p>
                      <p>Tel: {{teacher.phone}}</p>
                      <p class="mb-5">Email {{teacher.users.email}}</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!------------------------------------end-card-------------------------------->
    <div class="w-[82.6%] m-auto">
      <!-- created's message -->
      <success-message v-if="isCreated" class="text-green-500 items-center">
        <p><strong>Congratulation!</strong> Teacher was successfully created</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- deleted's message -->
      <success-message v-if="isDeleted" class="text-green-500 items-center">
        <p><strong>Congratulation!</strong> Teacher was successfully deleted</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- edited's message -->
      <success-message v-if="isEdit" class="text-green-500 items-center">
        <p><strong>Congratulation!</strong> Edit was successfully saved</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- axists account -->
      <error-message v-if="isAccountExist" class="text-red-500 items-center">
        <p><strong>Ops!</strong> Teacher account was already
          created</p>
        <delete-icon @click="close_messages"></delete-icon>
      </error-message>
    </div>
    <!---------------------------------table-view-teacher------------------------->
    <create_teacher @add-teacher="create_teacher"></create_teacher>
    <table class="bg-white w-[82.6%] m-auto box-border mt-4">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Position</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
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
              teacher.users.email
            }}</span>
          </td>

          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              teacher.position
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              teacher.users.email
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
              <icon-detail @click="togle"/>
              <icon-edit v-on:click="get_teacher_id(teacher.users.id)" @click="toggleModal"/>
              <icon-delete @click="delete_teacher(teacher.users.id)" />
            </span>
          </td>
        </tr>
        <div
          v-if="showModal"
          class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
          <div class="form-container shadow-md rounded w-2/5">
            <h2 class="header text-center text-white py-3">
              Edit Student Account
            </h2>
            <form-edit @cancel="onCancel" :teacher_id="teacher_id" @edit-teacher="edit_teacher"></form-edit>
          </div>
        </div>
        <div
          v-if="showModal"
          class="opacity-30 fixed inset-0 z-40 bg-black"
        ></div>
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
import FormEdit from './FormEditTeacherComponent.vue';
import SuccessMessage from '../../message/SuccessMessage.vue'
import ErrorMessage from '../../message/ErrorMessage.vue'
import DeleteIcons from "../icons/DeleteIcon.vue"
export default {
  components: { 
    "create_teacher": CreateTeacher,
    'success-message': SuccessMessage,
    'error-message': ErrorMessage,
    'delete-icon': DeleteIcons
  , 'form-edit' : FormEdit},
  data() {
    return {
      show_detail: false,
      icon_cancel: false,
      teacher_lists: [],
      isCreated: false,
      isAccountExist: false,
      isDeleted: false,
      isEdit: false,
      teacher_id : "",
      showModal: false,
      img_null:
     
        "https://icons.veryicon.com/png/o/education-technology/qiniu-cloud-service-icon/content-audit.png",
    };
  },
  methods: {
    get_teachers() {
      axiosClient.get("teachers").then((res) => {
        this.teacher_lists = res.data;
        console.log(this.teacher_lists);
      });
    },
    create_teacher(teacher) {
      axiosClient.post("teachers", teacher).then((response) => {
        this.get_teachers();
        if (response.status == 200) {
          this.isCreated = true;
          this.isDeleted = false;
          this.isEdit = false;
          this.isAccountExist = false;
        }
      }).catch((error) => {
        if (error.response.status == 500) {
          this.isAccountExist = true;
          this.isDeleted = false;
          this.isCreated = false;
          this.isEdit = false;
        }
      });
      
    },

    get_teacher_id(id){
        this.teacher_id = id;
        console.log(this.teacher_id);
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
          axiosClient.delete("teachers/" + id);
          this.get_teachers();
          this.isDeleted = true;
          this.isAccountExist = false;
          this.isCreated = false;
          this.isEdit = false;
        }
      });
    },
    close_messages() {
      this.isCreated = false;
      this.isAccountExist = false;
      this.isDeleted = false;
      this.isEdit = false;
    },
    onCancel(is_hide){
        this.showModal = is_hide;
    },
    toggleModal: function () {
      this.showModal = !this.showModal;
    },
    edit_teacher(id_teacher,new_teacher) {
      console.log(new_teacher);
      axiosClient.put("teacher_update/"+ id_teacher, new_teacher);
      this.get_teachers();
    }
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

.modal-mask {
    position: fixed;
    z-index: 10;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}
.modal-container, .header {
    width: 40%;
    height: auto;
    margin: 0px auto;
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
    z-index: 10;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}
.modal-enter-from, .modal-leave-to {
    opacity: 0;
}

.modal-enter-active .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
};
</style>
