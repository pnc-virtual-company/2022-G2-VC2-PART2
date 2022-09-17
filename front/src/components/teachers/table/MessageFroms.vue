<template>
   <!---------------------------------card-detail-------------------------------->
   <div class="modal-mask" v-if="closeForm">
      <div class="modal-wrapper">
          <div class="flex items-start justify-center py-2 rounded-t header bg-blue-400">
            <p class="flex justify-center w-full text-white text-xl">COMMENTS</p>
            <svg @click="close_form" class="h-6 w-6 text-red-500 m-auto mr-3 cursor-pointer"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
          </div>
          <div class="modal-container bg-blue-200 p-5">
            <form class="w-full">
                <div class="content w-full flex justify-center m-auto">
                    <textarea class="h-32 box-border w-full flex justify-center mb-3"></textarea>
                </div>
                <div class="flex justify-end items-center">
                    <div class="flex">
                        <input type="file" hidden name="file" id="file">
                        <label for="file"></label>
                        <svg class="h-6 w-6 text-orange-500 mr-2"  viewBox="0 0 24 24"  width="24"  height="24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <path d="M8 14s1.5 2 4 2 4-2 4-2" />  <line x1="9" y1="9" x2="9.01" y2="9" />  <line x1="15" y1="9" x2="15.01" y2="9" /></svg>
                        <svg class="h-6 w-6 text-gray-500 mr-2"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48" /></svg>
                    </div>
                    <span class="bg-blue-400 hover:bg-blue-500 py-2 px-5 rounded cursor-pointer">Send</span>
                </div>
            </form>
          </div>
      </div>
    </div>
    <!------------------------------------end-card-------------------------------->
</template>
<script>
export default {
    props:['showModal'],
    data() {
        return {
            closeForm:this.showModal
        
        }
    },
    methods : {
        close_form(){
            this.closeForm=!this.closeForm
        }
        
    },
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
    margin-top: 5rem;
}
.modal-container, .header {
    width: auto;
    width: 60%;
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