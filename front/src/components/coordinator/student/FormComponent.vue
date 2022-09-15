<template>
    <form class="px-5 pt-6 mb-5 box-border" @submit.prevent="onSubmit">
        <div class="input-group grid grid-cols-2 text-left">
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">First Name</label>
                <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus type="text" placeholder="First Name" v-model="first_name" />
                <error-message v-if="first_name_validation==false">*First Name is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Last Name</label>
                <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus placeholder="Last Name" v-model="last_name" />
                <error-message v-if="last_name_validation== false">*Last Name is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Gender</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="gender">
                        <option selected disabled>Gender</option>
                        <option value="Male" class="text-black">Male</option>
                        <option value="Female" class="text-black">Female</option>
                    </select>
                </div>
                <error-message v-if="gender_validation==false">*Gender is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Date of Birth</label>
                <input type="date" class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus v-model="date_of_birth">
                <error-message v-if="!date_validation">*Date is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Generation</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="generation">
                        <option selected disabled>Generation</option>
                        <option value="2022" class="text-black">2022</option>
                        <option value="2023" class="text-black">2023</option>
                        <option value="2024" class="text-black">2024</option>
                    </select>
                </div>
                <error-message v-if="generation_validation==false">*Batch is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Class</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="student_class">
                        <option selected disabled>Class</option>
                        <option value="Class A" class="text-black">Class A</option>
                        <option value="Class B" class="text-black">Class B</option>
                        <option value="Class C" class="text-black">Class C</option>
                        <option value="Class D" class="text-black">Class D</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Major</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="major">
                        <option selected disabled>Major</option>
                        <option value="WEB-A" class="text-black">WEB</option>
                        <option value="SNA" class="text-black">SNA</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Phone Number</label>
                <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus placeholder="Phone Number" v-model="phone" />
                <error-message v-if="phone_validation == false">*Phone is required</error-message>
            </div>
        </div>
        <div class="mb-2 px-2 w-full">
            <label class="block mb-1 text-sm " for="input1">Email</label>
            <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus placeholder="Email" v-model="email" />
            <error-message v-if="email_validation == false">*PNC Email is required</error-message>
        </div>
        <div class="flex items-center justify-end p-2 border-slate-200 mt-2 rounded-b">
            <button-add
                class="btn-cancel text-white active:bg-orange-600 text-sm rounded px-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                type="button" @click="onCancel">
                Cancel
            </button-add>
            <button-add
                class="btn-submit text-white active:bg-sky-600 text-sm text-sm px-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                type="submit">
                Create
            </button-add>
        </div>
    </form>
</template>
<script>
import ButtonViewVue from "@/components/button/ButtonView.vue"
import ErrorComponent from '../../message/ValidateText.vue'
export default {
    components: {
        'button-add': ButtonViewVue,
        'error-message': ErrorComponent,
    },
    data() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            gender: 'Gender',
            generation: 'Generation',
            student_class: 'Class',
            major: 'Major',
            phone: '',
            date_of_birth: "",
            // 
            isCreated: true,
            isExist: true,
            email_validation: true,
            first_name_validation: true,
            last_name_validation: true,
            gender_validation: true,
            generation_validation: true,
            phone_validation: true,
            date_validation: true,
        }
    },
    methods: {
        onCancel() {
            this.$emit('cancel', false);
        },
        onSubmit() {
            this.validations();
            if (this.first_name.trim().length > 0 && this.email.includes('@student.passerellesnumeriques.org') && this.last_name.trim().length > 0 && this.gender.trim().length > 0 && this.gender != "Gender" && this.generation.trim().length > 0 && this.generation != "Generation" && this.phone.trim().length > 0) {
                let new_student = {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    gender: this.gender,
                    date_of_birth: this.date_of_birth,
                    class: this.student_class,
                    generation: this.generation,
                    major: this.major,
                    email: this.email,
                    phone: this.phone
                }
                this.$emit('isShow', false, new_student, this.isCreated,this.isExist);
            }
        },
        validations() {
            if (this.first_name.trim().length == 0) {
                this.first_name_validation = false;
            } else {
                this.first_name_validation = true;
            }
            if (this.last_name.trim().length == 0) {
                this.last_name_validation = false;
            } else {
                this.last_name_validation = true;
            }
            if (this.phone.trim().length > 0) {
                this.phone_validation = true;
            } else {
                this.phone_validation = false;
            }
            if (this.gender == "Gender") {
                this.gender_validation = false;
            } else {
                this.gender_validation = true;
            }
            if (this.generation.trim().length > 0 && this.generation != "Generation") {
                this.generation_validation = true;
            } else {
                this.generation_validation = false;
            }
            if (this.date_of_birth != "") {
                this.date_validation = true;
            } else {
                this.date_validation = false;
            }
            if (this.email.trim().length > 0 && this.email.includes('@student.passerellesnumeriques.org')) {
                this.email_validation = true;
            } else {
                this.email_validation = false;
            }
        }
    }
}
</script>
<style scoped>
.btn-cancel {
    background-color: #FFAD5C;
}
.btn-submit {
    background-color: #22BBEA;
}
</style>