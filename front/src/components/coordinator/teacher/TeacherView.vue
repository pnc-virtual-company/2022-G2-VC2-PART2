<template>
  <div class="teacher">
    <div class="container w-10/12 m-auto flex justify-between">
      <div class="side-left"></div>
      <div class="side-right">
        <button
          class="bg-pink-500 text-white mt-3 active:bg-pink-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          type="button"
          @click="toggle_model"
          id="model"
        >
          Create Teacher
        </button>
      </div>
    </div>
    <div class="form">
      <form-view
        v-if="show_model"
        @change_model="toggle_model"
        @add="create_teacher"
      >
      </form-view>
      <div
        v-if="show_model"
        class="opacity-25 fixed inset-0 z-40 bg-black"
      ></div>
    </div>
  </div>
</template>

<script>
import FormView from "./FromView.vue";
import axios from '../../../axios-http';
export default {
  components: {
    "form-view": FormView,
  },
  data() {
    return {
      show_model: false,
      teachers: [],
    };
  },
  methods: {
    toggle_model() {
      this.show_model = !this.show_model;
    },
    create_teacher(is_show, obj) {
      this.show_model = is_show;
      this.teachers.push(obj);
      axios.post('teachers',obj).then((response)=>{
        console.log(response.data);
    })
    },
  },
};
</script>

<style scoped>
button {
  cursor: pointer;
}
#model{
  background-color: #22BBEA;
}
</style>
