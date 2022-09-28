<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container rounded">
                <form @submit.prevent="change_password">
                    <p class="text-2xl text-center text-orange-500">Change Password</p>
                    <div class="form-group">
                        <p class="mt-1">New Password</p>
                        <input type="password"
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
                            placeholder="New Password" v-model="password" required />
                        <p class="mt-2">Confirm Password</p>
                        <input type="password"
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
                            placeholder="Confirm Password" v-model="pass_confirm" required />
                        <div class="flex justify-end space-x-2 mt-3">
                            <button type="submit" @click="log_out"
                                class="w-full flex justify-center items-center px-5 mb-1 rounded py-2 bg-blue-400 text-white hover:bg-blue-500">
                                Save Change
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axiosClient from '../../../axios-http'
export default {
    data() {
        return {
            password: '',
            pass_confirm : '',
            is_show: true
        }
    },
    methods: {
        async change_password() {
        let id = this.$cookies.get('user_id');
        await axiosClient.put("teacher/reset_password/" + id, {
            password: this.password,
            pass_confirm: this.pass_confirm,
        });
        setTimeout(function () {
            window.location.reload();
        }, 80);
        },
        log_out() {
            this.$cookies.remove('token');
            this.$cookies.remove('role');
            this.$cookies.remove('id');
            this.$emit('logout', '0');
        }
    }
}
</script>