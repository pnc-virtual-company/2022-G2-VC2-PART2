<template>
  <div>
    <button class="bg-sky-500 text-white font-bold hover:bg-sky-400
     uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none 
     focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
      type="button" v-on:click="toggleModal()">
      RESET PASSWORD
    </button>
    <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
        <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5
         float-right text-3xl leading-none font-semibold
         outline-none focus:outline-none" v-on:click="toggleModal()">
          <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
          </span>
        </button>
      </div>
      <div class="cards-input">
        <span class="resets">RESETING PASSWORD</span>
              <div class="p-6 flex-auto ">
                <input class="" type="password" placeholder="Password"><br>
                 <input class="" type="password" placeholder="New Password">
              </div>
                 <!--footer-->
              <div class="buttons-input">
                    <button class="text-white-700 border border-solid border-sky-500 hover:bg-sky-400
                    hover:text-white font-bold uppercase text-sm
                    px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all
                          duration-150 bg-sky-500" type="button" v-on:click="toggleModal()">
                          Close
                    </button>
                    <button class="text-white-700 border border-solid border-sky-500 hover:bg-sky-400
                    hover:text-white font-bold uppercase text-sm 
                    px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all
                    duration-150 bg-sky-500" type="button" v-on:click="toggleModal()">
                    Save Changes
                  </button>
            </div>
        </div>
    </div>
    <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
  </div>
</template>

<script>
export default {
  name: "regular-modal",
  data() {
    return {
      showModal: false
    }
  },
  methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    }
  }
}
</script>
<style scoped>
  input[type='password']{
    background: rgb(232, 232, 232);
    width: 500px;
    padding: 10px 10px;
    margin: 6px 6px;
    border-radius: 4px;
    border: solid 2px black;
    color: black;
  }
  .resets{
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    background: #22BBEA;
    display: flex;
    margin:auto ;
    padding: 5px 5px;
    font-size: 22px;
    text-align: center;
    justify-content: center;

  }
  .cards-input{
    background: #BBD7E0;
    width: 555px;
    border-radius: 4px;
  }
  .buttons-input{
    display: flex;
    justify-content: flex-end;
    padding: 11px 21px;
    margin: 6px auto 5px;
  }

</style>