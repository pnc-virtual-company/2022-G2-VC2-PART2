<template>
  <div class="teacher_list">
    <!----------------------------------card-detail------------------------------->
    <CardDetail :user_info="user_info" v-if="is_show" @close_detail="close_detail"/>
    <div class="w-[82.6%] m-auto ">
      <!-- created's message -->
      <success-message v-if="isCreated" class="text-green-500 items-center mt-[5rem]">
        <p><strong>Congratulation!</strong> Teacher was successfully created</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- deleted's message -->
      <success-message v-if="isDeleted" class="text-green-500 items-center mt-[5rem]">
        <p><strong>Congratulation!</strong> Teacher was successfully deleted</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- edited's message -->
      <success-message v-if="isEdit" class="text-green-500 items-center mt-[5rem]">
        <p><strong>Congratulation!</strong> Edit was successfully saved</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- axists account -->
      <error-message v-if="isAccountExist" class="text-red-500 items-center mt-[5rem]">
        <p><strong>Ops!</strong> Teacher account was already
          created</p>
        <delete-icon @click="close_messages"></delete-icon>
      </error-message>
    </div>
    <!---------------------------------table-view-teacher------------------------->
    <create_teacher @add-teacher="create_teacher"></create_teacher>
    <table class="bg-white w-[82.6%] m-auto box-border mt-[3.8rem]">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
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
              <icon-detail @click="show_detail(teacher.id)"/>
              <icon-edit v-on:click="get_teacher_id(teacher.user_id,teacher.id)" @click="toggleModal"/>
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
            <form-edit @cancel="onCancel" :user_id="user_id" :teacher_id="teacher_id" @edit-teacher="edit_teacher"></form-edit>
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
import CardDetail from "./CardDetail.vue";
import FormEdit from './FormEditTeacherComponent.vue';
import SuccessMessage from '../../message/SuccessMessage.vue'
import ErrorMessage from '../../message/ErrorMessage.vue'
import DeleteIcons from "../icons/DeleteIcon.vue"
import DetailIcon from "../icons/DetailIcon.vue";
import EditIcon from "../icons/EditIcon.vue";
import RemoveIcons from "../icons/RemoveView.vue";
export default {
  components: { 
    "create_teacher": CreateTeacher,
    'success-message': SuccessMessage,
    'error-message': ErrorMessage,
    'delete-icon': DeleteIcons,
    'form-edit' : FormEdit, CardDetail,
    'icon-detail': DetailIcon,
    'icon-edit': EditIcon,
    'icon-delete': RemoveIcons,
},
  data() {
    return {
      teacher_lists: [],
      user_info: [],
      is_show: false,
      isCreated: false,
      isAccountExist: false,
      isDeleted: false,
      isEdit: false,
      teacher_id : "",
      user_id : "",
      showModal: false,
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
      axiosClient.post("teachers/create", teacher).then((response) => {
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

    get_teacher_id(u_id,teacher_id){
        this.user_id = u_id;
        this.teacher_id = teacher_id;
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
          this.isDeleted = true;
          this.isAccountExist = false;
          this.isCreated = false;
          this.isEdit = false;
        }
      });
    },
    show_detail(id) {
      this.is_show = true
      for(let value of this.teacher_lists) {
        if(value.id == id) {
          this.user_info = value
        }
      }
    },
    close_detail(close){
      this.is_show = close;
    },
    close_messages() {
      this.isCreated = false;
      this.isAccountExist = false;
      this.isDeleted = false;
      this.isEdit = false;
      setTimeout(() => this.create_teacher = false, 100);
    },
    onCancel(is_hide){
        this.showModal = is_hide;
    },
    toggleModal: function () {
      this.showModal = !this.showModal;
    },
    edit_teacher(new_teacher,user_id) {
      axiosClient.put("teachers/update/"+ user_id, new_teacher);
      this.get_teachers();
      this.isEdit = true;
      this.isAccountExist = false;
      this.isDeleted = false;
      this.isCreated = false;
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
</style>
