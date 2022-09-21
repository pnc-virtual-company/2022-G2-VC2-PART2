<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container rounded">
                <form @submit.prevent="password_confirm">
                    <p class="text-2xl text-center text-orange-500">Change Password</p>
                    <div class="form-group">
                        <p class="mt-1">Old Password</p>
                        <input type="password"
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
                            placeholder="Old Password" v-model="password" required />
                        <p class="mt-1">New Password</p>
                        <input type="password"
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
                            placeholder="New Password" v-model="password" required />
                        <p class="mt-2">Confirm Password</p>
                        <input type="password"
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-400 focus:outline-none"
                            placeholder="Confirm Password" v-model="pass_confirm" required />
                        <div class="flex justify-end space-x-2 mt-3">
                            <button type="submit"
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
export default {

}
</script>

<style>

</style>