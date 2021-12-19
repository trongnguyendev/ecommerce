<template>
    <div class="bg-bg-container">
        <div class="grid container">
            <div class="p-9 bg-bg rounded-md justify-between w-[500px] lg:order-first m-auto">
                <div>
                    <h2 class="text-[24px] font-bold text-color-t">Xin chào,</h2>
                    <div class="form-register">
                        <h1 class="text-s-14 mb-5 text-color-t">Đăng kí tài khoản</h1>
                        <div class="form-icon mb-3">
                            <UserIcon />
                            <input class="form-input" placeholder="Họ và tên...">
                        </div>
                        <div class="form-icon mb-3">
                            <MailIcon />
                            <input class="form-input" placeholder="Mail...">
                        </div>
                        <div class="form-icon mb-3">
                            <KeyIcon />
                            <input class="form-input" placeholder="Mật khẩu...">
                        </div>

                        <div class="form-icon mb-5">
                            <KeyIcon />
                            <input class="form-input" placeholder="Nhập lại mật khẩu...">
                        </div>

                        <p class="text-s-14 mb-5 opacity-50 text-color-t">
                            Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này, để quản lý quyền truy cập vào tài khoản của bạn và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi.
                        </p>
                        <label class="flex items-center mb-3">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2 cursor-pointer opacity-50 text-s-14 text-color-t">Tôi đồng ý với các điều khoản & quy định.</span>
                        </label>

                        <button class="bg-color-1st text-14 text-black w-full py-3 font-bold text-color-t">Đăng kí</button>
                    </div>

                    <div class="mt-2 text-center">
                        <NuxtLink to="/login" class="text-s-12 opacity-50 text-center text-color-t">Bạn đã có tài khoản? <span class="text-blue-700 cursor-pointer">Đăng nhập</span></NuxtLink>
                    </div>
                </div>

                <div class="login-orther mt-6">
                    <p class="opacity-50 text-center text-s-14 text-color-t">Hoặc tiếp tục bằng</p>
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
    layout: 'register',
    components: {
        UserIcon,
        XIcon,
        MailIcon,
        KeyIcon,
        UserCircleIcon,
        ChevronDownIcon
    },
}
</script>