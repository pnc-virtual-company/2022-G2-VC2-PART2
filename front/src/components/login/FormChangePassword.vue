<template>
  <div class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container rounded">
        <form @submit.prevent="password_confirm">
          <p class="text-2xl text-center text-orange-500">Reset Password</p>
          <div class="form-group">
            <p class="mt-1">Password</p>
            <input type="password"
              class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
              placeholder="Input your password" v-model="password" required />
            <p class="mt-2">Password Confirm</p>
            <input type="password"
              class="w-full px-4 text-sm py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
              placeholder="Password Confirm" v-model="pass_confirm" required />
            <div class="flex justify-end space-x-2 mt-3">
              <button type="submit"
                class="w-full text-sm flex justify-center items-center px-5 mb-1 rounded py-2 bg-blue-400 text-white hover:bg-blue-500">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axiosClient from "../../axios-http";
export default {
  components: {},
  data() {
    return {
      password: "",
      pass_confirm: "",
    };
  },
  methods: {
    async password_confirm() {
      const id = sessionStorage.getItem('user_id');
      await axiosClient.put("forgot_password/" + id, {
        password: this.password,
        pass_confirm: this.pass_confirm,
      });
      setTimeout(function () {
        window.location.reload();
      }, 80);

      this.$router.push("/users/login");
    },
    close_form(close) {
      this.$emit("close_form", close);
    },
  },
};
</script>
<style scoped>
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
