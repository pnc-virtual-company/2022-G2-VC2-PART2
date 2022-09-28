<template>
  <div>
    <div class="flex w-full justify-center space-x-5 mt-[5rem] mb-2 relative">
      <div class="flex">
        <span
          class="bg-span flex text-white justify-center items-center text-center rounded-l py-2 px-4"
          >Filter By Generation</span
        >
        <!--filter-by-generation-->
        <select
          class="w-[385px] p-2 py-2 text-gray-900 rounded-r focus:border-blue-300 outline-none text-slate-500"
          v-model="generation"
        >
          <option disabled value="Choose" aria-placeholder="Choose">
            Choose
          </option>
          <option value="">All Generation</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>
      <div class="flex">
      <!--search-by-name-->
        <span
          class="bg-span items-center text-white py-2 px-4 border-gray-300 rounded-l"
          >Search By Name</span
        >
        <input
          type="search"
          class="w-[345px] mr-[4rem] rounded-r p-2 py-2 border focus:border-blue-300 outline-none appearance-none"
          placeholder="Search"
          v-model="filter_by_name"
        />
      </div>
    </div>
    <!--------------end------------->
    <div class="modal-mask" v-if="showModal">
      <div class="modal-wrapper">
        <div
          class="flex items-start justify-center py-2 rounded-t header bg-blue-400"
        >
          <p class="flex justify-center w-full text-white text-l">COMMENTS</p>
        </div>
        <div class="modal-container bg-blue-200 p-4">
          <form class="w-full" @submit.prevent="sent_comment">
            <div class="w-full">
              <textarea
                class="w-full h-[100px] border p-2 resize-none focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                placeholder="comment here..."
                v-model="comment_teacher"
              ></textarea>
            </div>
            <div class="flex justify-end space-x-1 mt-2">
              <span
                @click="close_form"
                class="btn-submit cursor-pointer bg-orange-300 px-4 text-white hover:bg-orange-400 text-sm text-sm py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none transition-all duration-150"
                >Cancel</span
              >
              <button
                type="submit"
                class="bg-blue-400 px-5 text-white hover:bg-blue-500 text-sm text-sm py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none transition-all duration-150"
              >
                Send
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!------------------card-comment----------------------->
    <div class="flex justify-center">
      <div class="container w-[83.3%] mt-3">
        <div
          class="m-auto bg-white m-1 p-2 rounded"
          v-for="student of filter_students"
          :key="student" :student_id="student.id"
        >
          <div class="w-full flex">
            <img
              :src="student.users.profile"
              class="ml-[1rem] w-[50px] h-[50px] rounded-full"
            />
            <div class="w-full flex justify-evenly items-center">
              <p>
                {{ student.users.first_name }} {{ student.users.last_name }}
              </p>
              <p>{{ student.users.gender }}</p>
              <p>{{ student.class }}-{{ student.generation }}</p>
              <p>{{ student.users.email }}</p>
            </div>
            <span class="text-sm flex items-center space-x-3 mr-3">
              <svg
                class="h-8 w-8 text-blue-400 cursor-pointer"
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
            </span>
          </div>
          <!---------------------icon-show--------------------->
          <div class="icon_group"
          >
            <svg
              @click="show_incons(student.id)"
              v-if="student.show_comment == false"
              class="shadow shadow-gray-500 hover:shadow-indigo-500/40 h-6 w-6 text-blue-500 flex justify-center m-auto cursor-pointer rounded-full"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
            <svg
              @click="hide_incons(student.id)"
              v-if="student.show_comment == true"
              class="shadow shadow-gray-500 hover:shadow-indigo-500/40 text-blue-500 h-6 w-6 flex justify-center m-auto cursor-pointer bg-gray-200 rounded-full"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 15l7-7 7 7"
              />
            </svg>
          </div>
          <div>
            <div v-if="student.show_comment">
              <div v-for="comment of student.comments" :key="comment" :teacher_id="comment.teacher_id" class="flex items-center p-2 w-auto">
                <img :src="comment.teachers.users.profile" class="ml-[2rem] w-[40px] h-[40px] rounded-full"/>
                <p class="bg-blue-200 p-2 rounded ml-2">
                  {{ comment.comment }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axiosClient from "../../../axios-http";
export default {
  data() {
    return {
      showModal: false,
      comment_teacher: "",
      image_teacher: "",
      id_student: "",
      show: true,
      show_icon: false,
      student_data: [],
      get_student: [],
      get_teacher_profile: [],
      filter_by_name: '',
      generation: ''
    };
  },
  methods: {
    stopFollowUp(student_id) {
      this.$emit("student_id", student_id);
    },
    add_message(student_id) {
      this.id_student = student_id;
      console.log(this.id_student);
      this.showModal = !this.showModal;
    },
    show_incons(student_id) {
      this.show_icon = true;
      console.log(this.teacher_id);
      for (let value of this.student_data) {
        if (value.id == student_id) {
          value.show_comment = true;
        }
      }
    },
    hide_incons(student_id) {
      this.show_icon = false;
      for (let value of this.student_data) {
        if (value.id == student_id) {
          value.show_comment = false;
        }
      }
    },
    get_student_with_comments() {
      axiosClient.get("students/get").then((res) => {
        this.$emit('get_student_flo', this.student_data = res.data.filter((student) => student.status == true))
      });
    },
    get_profile() {
      axiosClient.get('teachers/get/'+ this.teacher_id).then((res) => {
        this.get_teacher_profile = res.data
      })
    },
    sent_comment() {
      let user_id = this.$cookies.get('user_id');
      axiosClient.get("teachers/get_teacher_id/" + user_id).then((res) => {
        this.teacher_id = res.data[0].teachers.id;
        let body = {
          teacher_id: this.teacher_id,
          student_id: this.id_student,
          comment: this.comment_teacher,
        };
        console.log(body);
        this.showModal = false;
        axiosClient.post("comments/add", body).then(() => {
          this.get_student_with_comments();
          this.comment_teacher = "";
          this.showModal = false;
        });
      });
    },
    close_form() {
      this.showModal = !this.showModal;
    },
    get_students() {
      console.log(this.students);
    },
  },
  computed: {
    filter_students() {
      if(this.generation != "") {
        return  this.student_data.filter(student => (student.generation == this.generation)
        && (student.users.first_name.toLowerCase().includes(this.filter_by_name.toLowerCase()) || student.users.last_name.toLowerCase().includes(this.filter_by_name.toLowerCase())));
      }else if(this.filter_by_name != "") {
        return this.student_data.filter(student => (student.users.first_name.toLowerCase().includes(this.filter_by_name.toLowerCase()) || student.users.last_name.toLowerCase().includes(this.filter_by_name.toLowerCase())));
      }else {
        return this.student_data
      }
    },
  },
  mounted() {
    this.get_student_with_comments();
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
