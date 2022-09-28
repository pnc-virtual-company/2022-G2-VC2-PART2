<template>
  <div class="teacher">
    <div class="container w-10/12 m-auto flex justify-between">
      <div class="side-left"></div>
      <div class="side-left w-full flex justify-end mt-[5rem]">
          <add-teacher-button
            type="button"
            class="fixed text-white bg-sky-400 text-sm px-3 py-1 font-bold rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            @click="toggle_model"
          >
            Create Teacher
        </add-teacher-button>
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
import FormView from "./FormCreateTeacherComponent.vue";
import ButtonViewVue from "@/components/button/ButtonView.vue";
export default {
  components: {
    "form-view": FormView,
    "add-teacher-button": ButtonViewVue
  },
  data() {
    return {
      show_model: false,
    };
  },
  methods: {
    toggle_model() {
      this.show_model = !this.show_model;
    },
    create_teacher(is_show, obj) {
      this.show_model = is_show;
      this.$emit('add-teacher', obj)
    }
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
