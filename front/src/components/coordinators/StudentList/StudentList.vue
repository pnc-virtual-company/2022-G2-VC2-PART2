<template>
  <div class="student relative">
    <!----------------------------------card-detail------------------------------->
    <CardDetail
      :user_info="user_info"
      v-if="is_show"
      @close_detail="close_detail"
    />
    <div class="w-[82.6%] m-auto">
      <!-- created's message -->
      <success-message
        v-if="isCreated"
        class="text-green-500 items-center py-1.5 mt-[5rem]"
      >
        <p><strong>Congratulation!</strong>Student was successfully created</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- deleted's message -->
      <success-message v-if="isDeleted" class="text-green-500 py-1.5 items-center mt-[5rem]">
        <p><strong>Congratulation!</strong> Student was successfully deleted</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- edited's message -->
      <success-message v-if="isEdit" class="text-green-500 items-center py-1.5 mt-[5rem]">
        <p><strong>Congratulation!</strong> Edit was successfully saved</p>
        <delete-icon @click="close_messages"></delete-icon>
      </success-message>
      <!-- axists account -->
      <error-message v-if="isAccountExist" class="text-red-500 items-center py-1.5 mt-[5rem]">
        <p><strong>Ops!</strong> Student account was already created</p>
        <delete-icon @click="close_messages"></delete-icon>
      </error-message>
    </div>
    <create-student
      @add-student="create_student"
      @isShow="onChange"
    ></create-student>
    <table class="bg-white w-[82.6%] m-auto mt-3">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Generation</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>

      <tbody v-for="student of student_lists" :key="student">
        <tr
          v-if="student.status == true"
          :style="{ backgroundColor: '#eecdad' }"
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
            <span class="flex justify-center text-sm">{{
              student.users.gender
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.generation
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.users.email
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
              <icon-detail @click="show_detail(student.id)" />
              <icon-edit
                v-on:click="get_student_id(student.user_id, student.id)"
                @click="toggleModal"
              />
              <icon-delete @click="deleteStudent(student.users.id)" />
            </span>
          </td>
        </tr>

        <tr
          v-if="student.status == false"
          :style="{ backgroundColor: '#ffffff' }"
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
            <span class="flex justify-center text-sm">{{
              student.users.gender
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.generation
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.users.email
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white w-36">
            <span class="flex justify-center space-x-2 icons">
              <icon-detail @click="show_detail(student.id)" />
              <icon-edit
                v-on:click="get_student_id(student.user_id, student.id)"
                @click="toggleModal"
              />
              <icon-move @click="show_form_follow(student.id)" />
              <icon-delete @click="deleteStudent(student.users.id)" />
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
            <form-edit-student
              @isShow="onChange"
              :user_id="user_id"
              :student_id="student_id"
              @edit-student="edit_student"
            >
            </form-edit-student>
          </div>
        </div>
        <div
          v-if="showModal"
          class="opacity-30 fixed inset-0 z-40 bg-black"
        ></div>
      </tbody>
    </table>
    <div class="flex justify-center mt-[50px]">
      <div v-if="student_lists.length == 0">
        <img :src="img_null" class="flex justify-center m-auto w-40" />
        <h1 class="text-red-500 text-center text-2xl mt-2">
          No Student in list
        </h1>
      </div>
    </div>
    <div class="tutor">
      <student-follow-up
        v-if="is_show_form_tutor"
        :student_id="student_id"
        @move_student_to_follow_up="move_student_to_follow_up"
        @cancle="on_cancle"
      ></student-follow-up>
    </div>
  </div>
  <!-------------------------------------end-view-------------------------------->
</template>
<script>
import axiosClient from "../../../axios-http";
import Swal from "sweetalert2";
import FormEdit from "./FormEdit.vue";
import CreateStudent from "./CreateStudent.vue";
import SuccessMessage from "../../message/SuccessMessage.vue";
import ErrorMessage from "../../message/ErrorMessage.vue";
import DeleteIcons from "../icons/DeleteIcon.vue";
import EditIcons from "../icons/EditIcon.vue";
import CardDetail from "./CardDetail.vue";
import RemoveIcons from "../icons/RemoveView.vue";
import DetailIcon from "../icons/DetailIcon.vue";
import MoveIcon from "../icons/MoveIcon.vue";
import FormStudentWithTutor from "./FormStudentFollowUpWithTutor.vue";

export default {
  components: {
    "form-edit-student": FormEdit,
    "create-student": CreateStudent,
    "success-message": SuccessMessage,
    "error-message": ErrorMessage,
    "delete-icon": DeleteIcons,
    "icon-delete": RemoveIcons,
    "icon-edit": EditIcons,
    "icon-detail": DetailIcon,
    "icon-move": MoveIcon,
    CardDetail,
    "student-follow-up": FormStudentWithTutor,
  },
  data() {
    return {
      student_lists: [],
      user_info: [],
      img_null:
        "https://icons.veryicon.com/png/o/education-technology/qiniu-cloud-service-icon/content-audit.png",
      showModal: false,
      student_id: "",
      user_id: "",
      isCreated: false,
      isAccountExist: false,
      isDeleted: false,
      isEdit: false,
      is_show: false,
      is_show_form_tutor: false,
    };
  },
  methods: {
    get_students() {
      axiosClient.get("students/get").then((res) => {
        this.student_lists = res.data;
      });
    },
    get_student_id(u_id, st_id) {
      this.user_id = u_id;
      this.student_id = st_id;
    },
    toggleModal: function () {
      this.showModal = !this.showModal;
    },
    onChange(isShow) {
      this.showModal = isShow;
    },
    on_cancle(cancle) {
      this.is_show_form_tutor = cancle;
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
          axiosClient.delete("students/delete/" + id);
          this.get_students();
          this.isDeleted = true;
          this.isAccountExist = false;
          this.isCreated = false;
          this.isEdit = false;
        }
      });
    },
    show_form_follow(id) {
      this.is_show_form_tutor = true;
      this.student_id = id;
    },
    move_student_to_follow_up(update_tutor) {
      axiosClient.put("teachers/update_tutor/" + this.student_id, update_tutor);
      this.is_show_tutor = true;
      this.is_show = false;
      console.log(this.student_id);
      this.is_show_form_tutor = false;
      this.get_students();
      axiosClient.get('students/get_by_id/' + this.student_id).then((response)=>{
        let list_of_user = response.data;
        console.log(list_of_user);
        for(let user of list_of_user){
          let user_email = user.users.email;   
          let mail_data = {first_name: user.users.first_name,last_name: user.users.last_name,reasons: user.reasons,tutor: user.tutor,email: user_email}
          axiosClient.post('sendTutor/email',mail_data);
          console.log(mail_data);
        }
      })
    },
    edit_student(new_student, user_id) {
      axiosClient.put("students/update/" + user_id, new_student);
      this.get_students();
      this.isEdit = true;
      this.isAccountExist = false;
      this.isDeleted = false;
      this.isCreated = false;
    },

    create_student(student) {
      axiosClient
        .post("students/create", student)
        .then((response) => {
          console.log(student);
          this.get_students();
          if (response.status == 200) {
            this.isCreated = true;
            this.isDeleted = false;
            this.isEdit = false;
            this.isAccountExist = false;
          }
        })
        .catch((error) => {
          if (error.response.status == 500) {
            this.isAccountExist = true;
            this.isDeleted = false;
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
    show_detail(id) {
      this.is_show = true;
      for (let value of this.student_lists) {
        if (value.id == id) {
          this.user_info = value;
        }
      }
    },
    close_detail(close) {
      this.is_show = close;
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
.bg-color {
  background: #22bbea;
}
</style>
