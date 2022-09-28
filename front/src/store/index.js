import { defineStore } from 'pinia'

export const useUserStore = defineStore('userStore', {
  state: () => ({ token: null }),
  getters: {
    get_user_token: () =>state => state.token,
  },
  actions: {
    get_token(user_token) {
      this.token = user_token
    },
  },
})
