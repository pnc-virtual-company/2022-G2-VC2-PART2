<template>
  <div class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container rounded">
        <slot>
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
                <button type="submit" class="flex justify-center items-center px-5 mb-1 rounded py-2 bg-blue-400 text-white hover:bg-blue-500">Submit</button>
                <button @click="close_form" class="flex justify-center items-center px-5 mb-1 rounded py-2 bg-orange-400 text-white hover:bg-orange-500">Cancel</button>
              </div>
            </div>
          </form>
        </slot>
      </div>
    </div>
  </div>
</template>

<script>
import axiosClient from '../../axios-http';
export default {
  data() {
    return {
      email: ''
    }
  },
  methods: {
    close_form(close) {
      this.$emit('close_form', close)
    },
    async handleSubmit() {
      const response = await axiosClient.post('forgot', {
        email: this.email
      })
      console.log(response);
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

<!-- resetPassword(){
  if (localStorage.getItem('role')=="student"){
    this.studentResetpassword();
  }
  if (localStorage.getItem('role')=="admin") {
    this.adminResetpassword();
  }
  this.oldpassword = null;
  this.newPassword = null;
  this.showResetPassword = !this.showResetPassword;
},
studentResetpassword(){
   axios.patch('http://127.0.0.1:8082/api/studentResetPassword/'+localStorage.getItem('userId'),{oldpassword:this.current_password,newPassword:this.new_password}).then((response)=>{
    console.log(response)
  })
},
adminResetpassword(){
  axios.patch('http://127.0.0.1:8082/api/adminResetPassword/'+localStorage.getItem('userId'),{oldpassword:this.current_password,newPassword:this.new_password}).then((response)=>{
    console.log(response);
  })
} -->
