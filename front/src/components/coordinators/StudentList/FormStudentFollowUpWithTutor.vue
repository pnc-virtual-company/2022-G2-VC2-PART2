<template>
  <div class="form-tutor mt-8">
    <form
      action=""
      class="px-5 mb-5 box-border "
      @submit.prevent="move_student_to_follow_up"
    >
      <div class="w-2/4 m-auto header  bg-slate-100 rounded-lg   shadow-md dark:bg-gray-800 dark:border-gray-700 px-4 py-4">
        <div class="mb-2 px-2 w-full">
          <label class="block mb-1 text-sm" for="input1">Reason</label>
          <textarea
            class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded h-32"
            autofocus
            placeholder="input text"
            v-model="reason"
          ></textarea>
        </div>
        <div class="mb-2 px-2 w-full">
          <label class="block mb-1 text-sm" for="input1">Tutors Name</label>
          <select
            v-model="tutors"
            class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
            id="select-item"
          >

            <option
              v-for="tutor of teachers"
              :key="tutor.id"
              class="text-black"
              :value="tutor.id"
            >
              <span>{{ tutor.users.first_name }}</span> <span>{{ tutor.users.last_name }}</span>
            </option>
          </select>
        </div>
        <div class="btn">
          <button
            class="btn-cancel text-white active:bg-orange-600 text-sm rounded px-3 py-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
            @click="cancle"
          >
            cancle
          </button>
          <button
            class="btn-submit text-white active:bg-sky-600 text-sm text-sm px-3 py-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
            type="submit"
          >
            Add
          </button>
        </div>

      </div>
    </form>
  </div>
</template>

<script>
import axiosClient from "../../../axios-http";
export default {
  props: {
    is_show_form_tutor: Boolean
  },
  data() {
    return {
      reason: "",
      tutors: "Name Tutor",
      teachers: [],
    };
  },
  methods: {
    get_teacher_list() {
      axiosClient.get("teachers/get/").then((response) => {
        this.teachers = response.data;
      });
    },
    cancle(){
        this.$emit('cancle',false);
    },
    add_tutor() {
      axiosClient
        .get("students/get_by_id/" + this.student_id)
        .then((response) => {
          let student_data = response.data;
          this.reason = student_data.reasons;
          this.tutor = student_data.tutor;
        });
    },
    move_student_to_follow_up() {
      let body = {
        reasons: this.reason,
        tutor: this.tutors,
        status: true,
      };
      this.$emit("move_student_to_follow_up",body);
    },
  },
  mounted() {
    this.add_tutor();
    this.get_teacher_list();
  },
};
</script>

<style scoped>
.btn {
  display: flex;
  justify-content: flex-end;
}
.bg-color {
  background: #22bbea;
}
textarea{
  resize: none;
}
.btn-cancel {
  background-color: #ffad5c;
  margin-right: 10px;
}
.btn-submit {
  background-color: #22bbea;
}
.header {
  background-color: #bbd7e0;
}
</style>
