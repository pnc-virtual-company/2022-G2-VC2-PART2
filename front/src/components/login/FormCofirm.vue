<template>
  <div class="container">
    <FormView>
      <form>
        <p class="text-2xl text-center text-orange-500">Reset Password</p>
        <div class="form-group">
          <p class="mt-1">Password</p>
          <input
            type="password"
            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
            placeholder="Input your password"
            v-model="password"
            required
          />
          <p class="mt-2">Password Confirm</p>
          <input
            type="password"
            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
            placeholder="Password Confirm"
            v-model="pass_confirm"
            required
          />
          <div class="flex justify-end space-x-2 mt-3">
            <button
              type="submit"
              class="flex justify-center items-center px-5 mb-1 rounded py-2 bg-blue-400 text-white hover:bg-blue-500"
            >
              Submit
            </button>
            <button
              @click="close_form"
              class="flex justify-center items-center px-5 mb-1 rounded py-2 bg-orange-400 text-white hover:bg-orange-500"
            >
              Cancel
            </button>
          </div>
        </div>
      </form>
    </FormView>
  </div>
</template>

<script>
import axiosClient from '../../axios-http';
import FormView from "./FormReset.vue";
export default {
  components: {FormView},
  data() {
    return {
      password: '',
      pass_confirm: ''
    }
  },
  methods:{
    async handleSubmit() {
      const response = await axiosClient.post('reset', {
        password: this.password,
        pass_confirm: this.pass_confirm
      });
      console.log(response);
    }
  }
}
</script>
<style scoped></style>
