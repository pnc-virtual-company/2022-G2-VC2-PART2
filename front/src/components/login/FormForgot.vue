<template>
 <div>
  <!-- form-reset-password -->
  <FormVerify v-if="show_reset" @close_form="close_form"/>
    <div class="modal-mask" v-if="is_show">
      <div class="modal-wrapper">
        <div class="modal-container rounded">
            <form @submit.prevent="handleSubmit">
              <p class="text-2xl text-center text-orange-500">Forgot Password</p>
              <div class="form-group">
                <p class="mt-1">Email</p>
                <input
                  type="email"
                  class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
                  placeholder="Input your email" v-model="email" required
                />
                <div class="flex justify-end space-x-2 mt-3">
                  <button  type="submit" class="flex justify-center items-center text-sm px-5 rounded py-2 bg-blue-400 text-white hover:bg-blue-500">Submit</button>
                  <button @click="close_form" class="flex justify-center text-sm items-center px-5 rounded py-2 bg-orange-400 text-white hover:bg-orange-500">Cancel</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
 </div>
</template>
<script>
import axiosClient from "../../axios-http";
import FormVerify from "./FormVerify.vue"
export default {
components: { FormVerify },
  data() {
      return {
          email: "",
          is_show: true,
          show_reset: false
      };
  },
  methods: {
      close_form(close) {
          this.$emit("close_form", close);
      },
      async handleSubmit() {
          this.is_show = false
          this.show_reset = true
          const response = await axiosClient.post("sendMail", {
              email: this.email
          })
          this.email = "";
          sessionStorage.setItem('user_id', response.data.user_id);
          sessionStorage.setItem('code_id', response.data.code_id);
      }
  },
};
</script>
<style>
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
.modal-container {
  width: 35%;
  height: auto;
  margin: 0px auto;
  padding: 15px 28px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Arial, Helvetica, sans-serif;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}
.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
.modal-enter-active .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
