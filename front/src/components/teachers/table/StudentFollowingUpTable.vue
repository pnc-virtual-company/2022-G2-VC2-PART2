<template>
  <div>
    <div class="modal-mask" v-if="showModal">
      <div class="modal-wrapper">
        <div class="flex items-start justify-center py-2 rounded-t header bg-blue-400">
          <p class="flex justify-center w-full text-white text-xl">COMMENTS</p>
          <svg @click="close_form" class="h-6 w-6 text-red-500 m-auto mr-3 cursor-pointer" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </div>
        <div class="modal-container bg-blue-200 p-5">
          <form class="w-full">
            <form-messages v-if="showModal" :showModal="showModal" :students_id="id_student" />

            <div class="flex items-center">
              <div class="flex w-full">
                <input type="text" v-model="comment_teacher"
                  class="w-full py-2 text-gray-700 mr-5 bg-white bg-clip-padding border border-solid border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none p-1">
                <input type="file" @change="image_teacher" hidden name="file" id="file">
                <div class="flex justify-center items-center">
                  <svg class="h-6 w-6 text-orange-500 mr-2" viewBox="0 0 24 24" width="24" height="24"
                    xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                    <line x1="9" y1="9" x2="9.01" y2="9" />
                    <line x1="15" y1="9" x2="15.01" y2="9" />
                  </svg>
                  <label for="file">
                    <svg class="h-6 w-6 text-gray-500 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48" />
                    </svg>
                  </label>
                </div>
              </div>
              <span class="bg-primary hover:bg-sky-300 py-2 text-white px-5 rounded cursor-pointer"
                @click="sent_comment()">Send</span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <table class="bg-white w-[82.6%] m-auto box-border mt-4">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Generation</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="cursor-pointer show hover:bg-gray-200" v-for="student of students" :key="student">
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center"><img :src="student.users.profile" class="w-10 h-10 rounded-full" /></span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{ student.users.first_name }} {{ student.users.last_name
            }}</span>
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
            <span class="flex justify-center text-sm">
              <svg class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                @click="add_message(student.id)">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
              <svg @click="stopFollowUp(student.id)" class="h-8 w-8 text-green-400" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
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
import axiosClient from "../../../axios-http";
import message_form from './MessageFroms.vue'
import CryptoJS from 'crypto-js';
export default {
  props: {
    students: Array,
  },
  components: {
    'form-messages': message_form
  },
  data() {
    return {
      showModal: false,
      list_students: this.students,
      teacher_id: '',
      comment_teacher: "",
      image_teacher: "",
      id_student: '',

    }
  },
  methods: {
    decrypt_id() {
      var cookiesId = this.$cookies.get('id');
      if (cookiesId != null) {
        var encryptedId = CryptoJS.AES.decrypt(cookiesId, 'user_id');
        var oringinId = encryptedId.toString(CryptoJS.enc.Utf8);
        return oringinId;
      }
    },
    stopFollowUp(student_id) {
      this.$emit('student_id', student_id);
    },
    add_message(student_id) {
      this.showModal = !this.showModal;
      this.id_student = student_id
    },
    sent_comment() {

      let user_id = this.decrypt_id();
      axiosClient.get("teachers/get_teacher_id/" + user_id).then((res) => {
        this.teacher_id = res.data[0].teachers.id;
        let body = {
          "teacher_id": this.teacher_id,
          "student_id": this.id_student,
          "comment": this.comment_teacher,
          "img": this.image_teacher,
        }
        axiosClient.post("comments/add", body).then((res) => {
          console.log(res.data);
          this.comment_teacher = ""
          this.showModal = false
        });
      });
    },
    close_form() {
      this.showModal = !this.showModal;
    },

  },

};
</script>

<style scoped>
.bg-color {
  background: #22bbea;
}

.modal-container,
.header {
  width: auto;
  width: 50%;
  height: auto;
  margin: 0px auto;
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
  z-index: 10;
}
</style>
