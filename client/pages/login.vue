<template>
    <div class="bg-bg-container">
        <div class="grid container">
            <div class="p-9 bg-bg rounded-md justify-between w-96 lg:order-first m-auto">
                <h2 class="text-[24px] font-bold text-color-t">Xin chào,</h2>
                <div class="form-register">
                    <h1 class="text-s-17 mb-5 text-color-t">Đăng nhập tài khoản</h1>
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
                        <span class="ml-2 cursor-pointer opacity-50 text-s-14 text-color-t">Ghi nhớ đăng nhập</span>
                    </label>

                    <button class="bg-color-1st text-14 text-black w-full py-3 font-bold text-color-t" @click="userLogin">Đăng nhập</button>
                </div>
                <div class="mt-2 text-center">
                    <NuxtLink to="/register" class="text-s-12 opacity-50 text-center text-color-t">Bạn chưa có tài khoản? <span class="text-blue-700 cursor-pointer">Đăng kí ngay</span></NuxtLink>
                </div>

                <div class="login-orther mt-6">
                    <p class="text-center text-s-14 text-color-t">Hoặc tiếp tục bằng</p>
                    <div class="flex justify-center my-4">
                        <button class="outline-none focus-visible:outline-none"><img src="~/images/fb.png" class="w-14" alt=""></button>
                        <button class="outline-none"><img src="~/images/gg.png" class="w-14 mx-5" alt=""></button>
                        <button><img src="~/images/zalo.png" class="w-14" alt=""></button>
                    </div>
                    <p class="opacity-50 text-center text-s-13 text-color-t">Bằng việc tiếp tục, bạn đã chấp nhận <span class="border-b border-gray-50"><nuxt-link class="underline" to="/">điều khoản sử dụng</nuxt-link></span></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { UserIcon, UserCircleIcon } from "@vue-hero-icons/outline"
import { XIcon, MailIcon, KeyIcon, ChevronDownIcon } from "@vue-hero-icons/solid"

export default {
    layout: 'login',
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