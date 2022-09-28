<template>
  <div class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container bg-blue-200 p-4 rounded">
        <form
          class="mb-2 box-border"
          @submit.prevent="move_student_to_follow_up"
        >
        <p class="text-center text-2xl text-orange-400">Move student to follow up</p>
          <div class="px-2 w-full">
            <label class="block mb-1 text-sm" for="input1">Reason</label>
            <textarea
              class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded h-[100px]"
              autofocus
              placeholder="input text"
              v-model="reason"
            ></textarea>
          </div>
          <div class="mb-2 px-2 w-full">
            <label class="block mb-1 text-sm" for="input1">Tutors Name</label>
            <select
              v-model="tutors"
              class="w-full mb-3 border px-5 pr-8 py-2 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
            >
              <option disabled value="Choose tutor">Choose</option>
              <option
                v-for="tutor of teachers"
                :key="tutor.id"
                class="text-black"
                :value="tutor.id"
              >
                {{ tutor.users.first_name }} {{ tutor.users.last_name }}
              </option>
            </select>
            <div class="flex justify-end space-x-1">
              <button
                class="btn-cancel px-3 text-white bg-orange-300 active:bg-orange-600 text-sm rounded py-2 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none transition-all duration-150"
                @click="cancel"
              >
                Cancel
              </button>
              <button
                class="btn-submit bg-blue-400 px-5 text-white hover:bg-blue-500 text-sm text-sm py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none transition-all duration-150"
                type="submit"
              >
                Add
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axiosClient from "../../../axios-http";
export default {
  props: {
    is_show_form_tutor: Boolean,
  },
  data() {
    return {
      reason: "",
      tutors: "Name Tutor",
      teachers: [],
      showModal: false,
    };
  },
  methods: {
    get_teacher_list() {
      axiosClient.get("teachers/get/").then((response) => {
        this.teachers = response.data;
      });
    },
    cancel() {
      this.$emit("cancle", false);
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
      this.$emit("move_student_to_follow_up", body);
    },
  },
  mounted() {
    this.add_tutor();
    this.get_teacher_list();
  },
};
</script>

<style scoped>
textarea {
  resize: none;
}
.modal-container {
  width: auto;
  width: 50%;
  height: auto;
  margin: 0px auto;
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
  z-index: 10;
}
</style>
