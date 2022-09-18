<template>
    <section class="h-screen bg-light_blue">
        <div class="container p-9 h-full">
            <div class="flex justify-center items-center w-10/12 m-auto g-6 h-full">
                <div class="w-6/12 mr-6">
                    <img src="../../assets/login.png" class="w-11/12" alt="Phone image" />
                    <h3 class="uppercase text-4xl mt-2 font-bold">STUDENT <span class="text-warning">FOLLOW UP</span>
                    </h3>
                </div>
                <div class="w-2/5 bg-white rounded ml-6">
                    <form class="w-full m-auto px-6 py-5 box-border" @submit.prevent="on_login">
                        <div class="header flex justify-center">
                            <h3 class="text-sky-300 font-bold text-3xl">Login</h3>
                        </div>
                        <div class="header flex justify-center mt-6">
                            <div class="header bg-primary w-22 h-22 rounded-full p-2 items-center flex justify-center">
                                <svg class="h-16 w-16 text-white" fill="white" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <!-- Email input -->
                        <div class="mb-6 mt-6 flex">
                            <div class="mail bg-primary px-4 flex justify-center items-center rounded-l">
                                <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="text"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-r transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Email address" v-model="email" />
                            </div>
                            <small id="smali1" v-if="email_validation">Email is required</small>
                        <!-- Password input -->
                        <div class="mb-8 mt-8 flex py-2">
                            <div class="pass bg-primary px-4 flex justify-center items-center rounded-l">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                            <input type="password" required
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700
                                 bg-white bg-clip-padding border border-solid border-gray-300 rounded-r
                                  transition ease-in-out m-0 focus:text-gray-700 
                                  focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Password" v-model="password" />
                            </div>
                            <small id="smali2" v-if="paasswrod_validation">Password is required</small>
                        <!-- Submit button -->
                        <button type="submit" @click="validateion"
                            class="inline-block mb-8 py-3 bg-warning text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-warning_300 hover:shadow-lg focus:bg-warning-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-warning-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                            log in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</template>
<script>

import axiosClient from "@/axios-http";


export default {
    data() {
        return {
            email: "",
            password: "",
            email_validation:false,
            paasswrod_validation:false,
        }
    },
    methods: {
        on_login() {
            let user_login = {
                email: this.email,
                password: this.password
            }
            axiosClient.post('user/login', user_login).then((response) => {
                localStorage.setItem('token', response.data.token);
                localStorage.setItem('role', response.data.user.role);
                if (response.data.user.role == '1'){
                    this.$router.push('/coordinator/teacher_list')
                }else if (response.data.user.role == '2'){
                    this.$router.push('/teachers/student_list')
                }
                setTimeout(function () {
                    window.location.reload();
                }, 80);
            })
        },

        validateion(){
            if(this.email.trim().length==0){
                this.email_validation=true;
            }else{
                this.email_validation=false
            }

            if(this.password.trim().length==0){
                this.paasswrod_validation=true
            }else{
                this.paasswrod_validation=false
            }
        }, 
    
    },

    computed:{


    }

}
</script>

<style scoped>
    small{
        color: red;
        position: absolute
    }
    
    #smali1{
        margin-top: -22px;
        font-size: 15px;
    }
    #smali2{
        
        margin-top: -35px;
        font-size: 15px;
    }
    button{
        margin-top: 20px;
    }

</style>