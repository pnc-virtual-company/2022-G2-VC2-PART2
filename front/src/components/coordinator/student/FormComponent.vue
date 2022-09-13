<template>
    <form class="px-5 pt-6 mb-5 box-border" @submit.prevent="onSubmit">
        <div class="input-group grid grid-cols-2 text-left">
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">First Name</label>
                <input id="input1" class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
                    type="text" autofocus placeholder="First Name" v-model="first_name"
                    @keyup="first_name_validated()" />
                <error-message v-if="is_first_name==false">*First Name is required</error-message>
            </div>
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Last Name</label>
                <input id="input1"
                    class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
                    type="text" autofocus placeholder="Last Name" v-model="last_name" @keyup="last_name_validated()" />
                <error-message v-if="is_last_name==false">*Last Name is required</error-message>
            </div>
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Gender</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="gender" @click="gender_validated()">
                        <option selected disabled>Gender</option>
                        <option value="M" class="text-black">Male</option>
                        <option value="F" class="text-black">Female</option>
                    </select>
                </div>
                <error-message v-if="is_gender==false">*Gender is required</error-message>
            </div>
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Batch</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="batch" @click="batch_validated()">
                        <option selected disabled>Batch</option>
                        <option value="2023-WEB-A" class="text-black">2023-WEB-A</option>
                        <option value="2023-WEB-B" class="text-black">2023-WEB-B</option>
                        <option value="2023-SNA" class="text-black">2023-SNA</option>
                        <option value="2024-A" class="text-black">2024-A</option>
                        <option value="2024-B" class="text-black">2024-B</option>
                        <option value="2024-C" class="text-black">2024-C</option>
                        <option value="2024-D" class="text-black">2024-D</option>
                    </select>
                </div>
                <error-message v-if="is_batch==false">*Batch is required</error-message>
            </div>
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Email</label>
                <input id="input1"
                    class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
                    type="text" autofocus placeholder="Email" v-model="email" @keyup="email_validated()"/>
                <error-message v-if="!is_mail">*PNC Email is required</error-message>
            </div>
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Date of Birth</label>
                <date-picker></date-picker>
                <error-message v-if="!is_mail">*PNC Email is required</error-message>
            </div>
            <div class="mb-3 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Phone Number</label>
                <input id="input1"
                    class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
                    type="text" autofocus placeholder="Phone Number" v-model="phone"
                    @keyup='phone_validated()' />
                <error-message v-if="is_phone==false">*Phone is required</error-message>
            </div>
            <div class="div"></div>
            <div class="flex items-center justify-end p-2 border-slate-200 mt-3 rounded-b">
                <button-add
                    class="btn-cancel text-white active:bg-orange-600 text-sm rounded px-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" @click="onCancel">
                    Cancel
                </button-add>
                <button-add
                    class="btn-submit text-white active:bg-sky-600 text-sm text-sm px-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="submit">
                    Create
                </button-add>
            </div>
        </div>
    </form>
</template>

<script>
import ButtonViewVue from "@/components/button/ButtonView.vue"
import ErrorComponent from '../../message/ErrorComponent.vue'
import DatePicker from './DatePicker.vue'
export default {
    components: {
        'button-add': ButtonViewVue,
        'error-message': ErrorComponent,
        'date-picker': DatePicker,
    },
    data() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            gender: 'Gender',
            batch: 'Batch',
            phone: '',
            email_validattion: true,
            first_name_validattion: true,
            last_name_validattion: true,
            gender_validattion: true,
            batch_validattion: true,
            phone_validattion: true,
        }
    },
    methods: {
        onCancel() {
            this.$emit('cancel', false);
        },
        onSubmit() {
            this.validations();
            if (this.first_name.trim().length > 0 && this.email.includes('@student.passerellesnumeriques.org') && this.last_name.trim().length > 0 && this.gender.trim().length > 0 && this.gender != "Gender" && this.batch.trim().length > 0 && this.batch != "Batch" && this.phone.trim().length > 0 ) {
                let new_student = {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    gender: this.gender,
                    batch: this.batch,
                    phone: this.phone
                }
                this.$emit('isShow', false,new_student);
            }
        },
        validations() {
            if (this.first_name.trim().length == 0) {
                this.first_name_validattion = false;
            } else {
                this.first_name_validattion = true;
            }
            if (this.last_name.trim().length == 0) {
                this.last_name_validattion = false;
            } else {
                this.last_name_validattion = true;
            }
            if (this.phone.trim().length == 0) {
                this.phone_validattion = false;
            } else {
                this.phone_validattion = true;
            }
            if (this.gender == "Gender") {
                this.gender_validattion = false;
            } else {
                this.gender_validattion = true;
            }
            if (this.batch.trim().length == 0 || this.batch == "Batch") {
                this.batch_validattion = false;
            } else {
                this.batch_validattion = true;
            }
            if (this.email.trim().length > 0 && this.email.includes('@student.passerellesnumeriques.org')) {
                this.email_validattion = true;
            } else {
                this.email_validattion = false;
            }
        },
        first_name_validated() {
            if (this.first_name.trim().length == 0) {
                this.first_name_validattion = false;
            } else {
                this.first_name_validattion = true;
            }
        },
        last_name_validated() {
            if (this.last_name.trim().length == 0) {
                this.last_name_validattion = false;
            } else {
                this.last_name_validattion = true;
            }
        },
        phone_validated() {
            if (this.phone.trim().length == 0) {
                this.phone_validattion = false;
            } else {
                this.phone_validattion = true;
            }
        },
        email_validated() {
            if (this.email.trim().length > 0 && this.email.includes('@student.passerellesnumeriques.org')) {
                this.email_validattion = true;
            } else{
                this.email_validattion = false;
            }
        },
        gender_validated() {
            if (this.gender == "Gender") {
                this.gender_validattion = false;
            } else {
                this.gender_validattion = true;
            }
        },
        batch_validated() {
            if (this.batch == "Batch") {
                this.batch_validattion = false;
            } else {
                this.batch_validattion = true;
            }
        },
    },
    computed: {
        is_mail() {
            return this.email_validattion;
        },
        is_first_name() {
            return this.first_name_validattion;
        },
        is_last_name() {
            return this.last_name_validattion;
        },
        is_batch() {
            return this.batch_validattion;
        },
        is_phone() {
            return this.phone_validattion;
        },
        is_gender() {
            return this.gender_validattion;
        },
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