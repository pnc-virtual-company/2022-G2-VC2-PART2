<template>
    <div>
      <button class="b-detail"
        type="button" v-on:click="toggleModal()">Detail
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

          <div class="detail-icons">
            <span class="detail">Profiles Detail</span>
              <svg  v-on:click="toggleModal()" id="icons" class="h-5 w-5 text-pink-500"  viewBox="0 0 24 24" 
               fill="none"  stroke="currentColor"  stroke-width="2"  
               stroke-linecap="round"  stroke-linejoin="round"> 
                <line x1="18" y1="6" x2="6" y2="18" /> 
                 <line x1="6" y1="6" x2="18" y2="18" /></svg>
          </div>
          <div class="p-6 flex-auto ">
                <div class="card-info">
                  <div class="card-image">
                         <img src="../../../assets/3s.png" class="images">

                         <label for="file">
                           <input type="file" id="file" hidden name="image"/>
                          <svg class="h-8 w-8 text-gray profile" width="32" height="32" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="13" r="3" />
                              </svg>
                          </label>

                         <div class="name-text">
                             <div class="names">Narong Bunyon</div>
                         </div>
                    </div>
                     <div class="name-contain">
                        <div class="name-body">
                            <p>Major   : <small>WEB</small></p>
                            <p>Batch   : <small>2022</small></p>
                            <p>Date_Bith  : <small>02-04-2022</small></p>
                            <p>Phone    : <small>0313355680</small></p>
                            <p>Totul    : <small>Rady Training</small> </p>
                            <p>Email    : <small>narong.bunyon@student.passerellesnumeriques.org</small></p>
                        </div>
                  </div>
                </div>
            </div>
            </div>
        </div>
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
.cards-input{
    background: #BBD7E0;
    height: 45vh;
    width: 990px;
    border-radius: 4px;
    }
  .card-info{
      display: flex;
    }
    .detail-icons{
      display: flex;
    }
    label{
      display: flex;
      justify-content: center;
      align-items: center;
      position:absolute;
      margin-top: -48px;
      margin-left: 110px;
    }
 .detail{
    display: flex;
  text-align: center;
  justify-content: center;
  width: 1090px;
  padding: 5px 5px;
  font-size: 28px;
  font-weight: bold;
  color: white;
  border-top-left-radius: 4px;
  background: #22BBEA;
}
#icons{
  display: flex;
  font-size: 8px;
  padding: 5px 5px;
  width: 55px;
  height: 6vh;
  border-top-right-radius: 4px;
  justify-content: flex-end;
  background: #22BBEA;
 }
.name-text,.names{
    margin: 5px auto 8px;
    text-align: center;
    display: flex;
    justify-content: center;
    font-size: 28px;
    width: 250px;
    font-weight: bold;
    color: black;
}
.images{
  margin:10px auto 20px;
  height: 27vh;
  width: 260px;
  border-radius: 100%;
  background: pink;
}

.buttons-input{
    display: flex;
    justify-content: flex-end;
    padding: 11px 21px;
    margin: 6px auto 5px;
    }

    .name-contain{
        display: flex;
        margin: 14px 15px;
        justify-content: flex-start;
    }
    p{
      display: flex;
      justify-content: flex-start;
      font-size: 22px;
      font-weight: bold;
      margin: 6px 33px;
      color: black;
    }

    small{
      margin: 3px 10px;
      font-size: 20px;
      color: rgb(0, 0, 0);
    }
    .b-detail{
      color: rgba(255, 255, 255, 0);
    }

  
  </style>