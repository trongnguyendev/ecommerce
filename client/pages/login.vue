<template>
    <div class="container bg-bg-container">
        <div class="grid">
            <div class="p-9 w-full lg:w-3/4 justify-between w-96 order-last lg:order-first m-auto">
                <div class="form-register">
                    {{ errors }}
                    <h1 class="text-s-17 mb-5">Đăng nhập tài khoản</h1>
                    <div class="form-icon mb-3">
                        <MailIcon />
                        <input class="form-input" v-model="login.username" placeholder="Mail...">
                    </div>
                    <div class="form-icon mb-3">
                        <KeyIcon />
                        <input class="form-input" v-model="login.password" placeholder="Mật khẩu...">
                    </div>
                    <label class="flex items-center mb-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2 cursor-pointer text-color-gray text-s-14">Ghi nhớ đăng nhập</span>
                    </label>

                    <button class="bg-color-1st text-14 text-black w-full py-3 font-bold" @click="userLogin">Đăng nhập</button>
                </div>

                <div class="login-orther mt-6">
                    <p class="text-color-gray text-center text-s-14">Hoặc tiếp tục bằng</p>
                    <div class="flex justify-center my-4">
                        <button class="outline-none focus-visible:outline-none"><img src="~/images/fb.png" class="w-14" alt=""></button>
                        <button class="outline-none"><img src="~/images/gg.png" class="w-14 mx-5" alt=""></button>
                        <button><img src="~/images/zalo.png" class="w-14" alt=""></button>
                    </div>
                    <p class="text-color-gray text-center text-s-13">Bằng việc tiếp tục, bạn đã chấp nhận <span class="border-b border-gray-50"><nuxt-link class="underline" to="/">điều khoản sử dụng</nuxt-link></span></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { UserIcon, UserCircleIcon } from "@vue-hero-icons/outline"
import { XIcon, MailIcon, KeyIcon, ChevronDownIcon } from "@vue-hero-icons/solid"

export default {
    
    components: {
        UserIcon,
        XIcon,
        MailIcon,
        KeyIcon,
        UserCircleIcon,
        ChevronDownIcon
    },
    data() {
        return {
            login: {
                username: 'trongnguyendev@gmail.com',
                password: 'a1234567'
            },
            errors: ''
        }
    },
    methods: {
        async userLogin() {
            try {
                await this.$auth.loginWith('laravelJWT', {
                    data: {
                        email: this.login.username,
                        password: this.login.password
                    }
                }).then(() => {
                    this.$router.push('/')
                })

            } catch (err) {
                this.errors = err
            }
        },
    }
}
</script>