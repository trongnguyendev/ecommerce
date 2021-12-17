<template>
    <div class="dialog" x-spread="dialog" x-cloak v-if="!isLogged">
        <div class="dialog-content top-0 lg:top-24 lg:w-[800px] relative rounded-none lg:rounded-xl">
            <button type="button" class="btn btn-light btn-sm btn-icon absolute right-4 top-3 lg:-right-4 lg:-top-4 z-50 rounded-full bg-white p-14-important" aria-label="Close" x-on:click="close">
                <XIcon />
            </button>
            <div class="dialog-body flex  flex-col lg:flex-row p-0-important">
                <div class="p-9 w-full lg:w-3/4 justify-between order-last lg:order-first">
                    <div>
                        <h2 class="text-[24px] font-bold">Xin chào,</h2>
                        <div class="form-register" v-if="form == 'register'">
                            <h1 class="text-s-14 mb-5">Đăng kí tài khoản</h1>
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

                            <p class="text-s-14 mb-5 text-color-gray">
                                Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này, để quản lý quyền truy cập vào tài khoản của bạn và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi.
                            </p>
                            <label class="flex items-center mb-3">
                                <input type="checkbox" class="form-checkbox">
                                <span class="ml-2 cursor-pointer text-color-gray text-s-14">Tôi đồng ý với các điều khoản & quy định.</span>
                            </label>

                            <button class="bg-color-1st text-14 text-black w-full py-3 font-bold">Đăng kí</button>
                        </div>

                        <div class="form-register" v-if="form == 'login'">
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
                        <div class="mt-2">
                            <p v-if="form == 'register'" class="text-s-12 text-color-gray text-center">Bạn đã có tài khoản? <span @click="switchForm" class="text-blue-700 cursor-pointer">Đăng nhập</span></p>
                            <p v-if="form == 'login'" class="text-s-12 text-color-gray text-center">Bạn chưa có tài khoản? <span @click="switchForm" class="text-blue-700 cursor-pointer">Đăng kí ngay</span></p>
                        </div>
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
                <div class="bg-graient-login flex w-full lg:w-1/4 order-first lg:order-last overflow-hidden">
                    <img src="~/images/banner_register.png" alt="" class="w-40 h-40 m-auto hidden lg:block">
                    <div class="w-full h-48 bg-cover bg-center m-auto lg:hidden banner_register_mb">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>