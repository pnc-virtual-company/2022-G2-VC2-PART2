<template>
   <!---------------------------------card-detail-------------------------------->
   <div class="modal-mask">
      <div class="modal-wrapper">
          <div class="flex items-start justify-center py-2 rounded-t header bg-blue-300">
            <h2 class="flex justify-center w-full text-white text-xl">Teacher Detail</h2>
            <svg @click="close_detail" class="h-6 w-6 text-red-500 m-auto mr-3 cursor-pointer"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
          </div>
          <div class="modal-container bg-white">
              <div class="flex space-x-[50px]">
                  <div class="ml-[50px]">
                      <img :src="user_info.users.profile" width="126" class="mt-5 rounded-full">
                      <p class="text-center text-xl font-bold mb-5">{{user_info.users.first_name}} {{user_info.users.last_name}}</p>
                  </div>
                  <div class="mt-[18px] leading-loose">
                      <p>Gender: {{user_info.users.gender}}</p>
                      <p>Position: {{user_info.position}}</p>
                      <p>Role: {{user_info.users.role}}</p>
                      <p>Tel: {{user_info.phone}}</p>
                      <p class="mb-5">Email {{user_info.users.email}}</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!------------------------------------end-card-------------------------------->
</template>

<script>
export default {
    props: ['user_info'],
    data() {
        return {
            
        }
    },
    methods : {
        close_detail(){
            this.$emit('close_detail', false)
        }
    },
    mounted (){
        console.log(this.user_info)
    }
}
</script>

<style scoped>
/* card-detail */
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
.modal-container, .header {
    width: 40%;
    height: auto;
    margin: 0px auto;
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
    z-index: 10;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}
.modal-enter-from, .modal-leave-to {
    opacity: 0;
}

.modal-enter-active .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
};
</style>