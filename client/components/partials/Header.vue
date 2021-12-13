<template>
    <header
    class="bg-color-1st duration-75 transition"
    :class="{ 'scrolled': !view.atTopOfPage, 'relative': view.atTopOfPage }" 
    >
        <div class="container">
            <!-- header top -->
            <div class="header__top flex justify-between items-center md:py-6 py-2">
                <div class="logo flex w-52 mr-14">
                    <img src="~/images/logo.png" alt="" class="w-full m-auto">
                </div>
                <form action="" class="hidden lg:inline-flex ml-auto flex-grow">
                    <div>
                        <multiselect v-model="value" :options="options" class="w-auto min-w-[150px]" placeholder="Tất cả"></multiselect>
                    </div>
                    <input
                    class="text-s-14 text-black p-3 rounded-l-none w-full"
                    type="text" name="" id="" placeholder="I'm shopping for..."
                    >

                    <input
                    class="bg-black text-s-14 text-white w-24 px-5 py-3 outline-none focus:outline-none rounded-r-sm"
                    type="submit" value="Tìm kiếm"
                    >
                </form>

                <div class="flex justify-end items-center ml-7">
                    <div @click="toggleMode()" class="cursor-pointer">
                        <div v-if="$colorMode.value == 'dark'" >
                            <IconsLight class="w-8 h-8" />
                        </div>
                        <div v-if="$colorMode.value == 'light'">
                            <IconsDark class="w-8 h-8" />
                        </div>
                    </div>
                    <div x-data="dropdown()" class="hidden lg:block ml-7">
                        <div class="relative cursor-pointer" id="bottom" x-spread="trigger">
                            <IconsCart  class="w-8 h-8" />
                            <span class="absolute top-[-2px] right-[-10px] bg-black text-white block w-5 h-5 text-s-11 pt-[2px] rounded-full text-center">0</span>
                        </div>
                        <div class="dropdown-list w-80" id="color-menu" x-spread="dropdown" x-position="bottom-start" x-cloak>
                            <p>Chưa có sản phẩm nào.</p>
                        </div>
                    </div>
                    <div x-data="dropdown()" class="ml-7">
                        <div class="relative cursor-pointer" id="bottom" x-spread="trigger">
                            <IconsNotification  class="w-8 h-8" />
                            <span class="absolute top-[-2px] right-[-10px] bg-black text-white block w-5 h-5 text-s-11 pt-[2px] rounded-full text-center">0</span>
                        </div>
                        <div class="dropdown-list w-80" id="color-menu" x-spread="dropdown" x-position="bottom-start" x-cloak>
                            <a href="#" class="dropdown-item">Red</a>
                            <a href="#" class="dropdown-item">Green</a>
                        </div>
                    </div>
                    
                    <div x-data="dialog()">
                        <div class="flex ml-7 cursor-pointer items-center" x-spread="trigger">
                            <UserCircleIcon class="w-8 h-8 stroke-0 font-thin" />
                            <div class="ml-1 hidden xl:block" v-if="!isLogged">
                                <h5 class="text-s-13">Đăng nhập</h5>
                                <h5 class="text-s-13">Đăng kí</h5>
                            </div>
                            <div class="ml-1 hidden xl:block" v-if="isLogged">
                                <h5 class="text-s-13">{{ currentUser.name }}</h5>
                            </div>
                        </div>
                        <div class="dialog" x-spread="dialog" x-cloak v-if="!isLogged">
                            <div class="dialog-content top-0 lg:top-24 lg:w-[800px] relative rounded-none lg:rounded-xl">
                                <!-- <div class="dialog-header">Dialog Title
                                    <button type="button" class="btn btn-light btn-sm btn-icon" aria-label="Close" @click="close">
                                        <XIcon />
                                    </button>
                                </div> -->
                                <button type="button" class="btn btn-light btn-sm btn-icon absolute right-4 top-3 lg:-right-4 lg:-top-4 z-50 rounded-full bg-white p-14-important" aria-label="Close" x-on:click="close">
                                    <XIcon />
                                </button>
                                <div class="dialog-body flex  flex-col lg:flex-row p-0-important">
                                    <div class="p-9 w-full lg:w-3/4 justify-between order-last lg:order-first">
                                        <div>
                                            <!-- form register -->
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

                                            <!-- form login -->
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
                    </div>

                </div>

            </div>
            <b-button
                label="Launch toast (default)"
                size="is-medium"
                type="is-success"
                @click="toast" />
        </div>

        <div class="divider"></div>
        
        

        <div class="container">
            <!-- navigation -->
            <nav class="">
                <ul class="flex space-x-7 items-center">
                    <li
                    v-for="item in menu" :key="item.name"
                    class="group cursor-pointer visibility-transition py-3 space-x-8"
                    >
                        <NuxtLink to="/" class="text-s-14 flex items-center font-bold">{{ item.name }} <ChevronDownIcon class="ml-1 w-4" v-if="item.sub_menu" /></NuxtLink>
                        <ul
                        v-if="item.sub_menu"
                        class="sub_navigation w-full absolute top-full left-0 p-7 bg-white z-10 mx-0"
                        >
                            <div class="container m-auto flex space-x-8">
                                <li v-for="item_sub in item.sub_menu" :key="item_sub.name">
                                    <a href="" class="block text-center text-s-12">
                                        <img :src="require('/assets/images/' + item_sub.picture)" class="w-16 m-auto" />
                                        {{ item_sub.sub_name }}
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

    </header>
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
            value: 'Tất cả',
            options: ['Tất cả', 'Điện thoại', 'Đồ gia dụng', 'Thời gian nam', 'Thời trang nữ', 'label', 'searchable', 'clearOnSelect', 'hideSelected', 'maxHeight', 'allowEmpty', 'showLabels', 'onChange', 'touched'],
            form: 'login',
            view: {
                atTopOfPage: true
            },
            img1: require('assets/images/menu1.jpg'),
            menu: [
                {
                    name : 'Wallets',
                    sub_menu: [
                        {
                            sub_name : "Men's Wallter",
                            picture : 'menu2.jpg'
                        },
                        {
                            sub_name : "Wommen's Wallter",
                            picture : 'menu1.jpg'
                        },
                        {
                            sub_name : "Kid's Wallter",
                            picture : 'menu2.jpg'
                        },
                        {
                            sub_name : "Billliords",
                            picture : 'menu3.jpg'
                        },
                        {
                            sub_name : "Card Holders",
                            picture : 'Billfolds.jpg'
                        },
                    ]
                },
                {
                    name : 'Wallets1',
                    sub_menu: [
                        {
                            sub_name : "Men's Wallter",
                            picture : 'menu2.jpg'
                        },
                        {
                            sub_name : "Wommen's Wallter",
                            picture : 'menu1.jpg'
                        },
                        {
                            sub_name : "Kid's Wallter",
                            picture : 'menu2.jpg'
                        },
                        {
                            sub_name : "Billliords",
                            picture : 'menu3.jpg'
                        },
                        {
                            sub_name : "Card Holders",
                            picture : 'Billfolds.jpg'
                        },
                    ]
                },
                {
                    name : 'Card',
                    sub_menu: [
                        {
                            sub_name : "Business Card",
                            picture : 'Pixel_Cases.jpg'
                        },
                        {
                            sub_name : "Holder",
                            picture : 'Card_Holders.jpg'
                        },
                        {
                            sub_name : "Folios",
                            picture : 'Folios.jpg'
                        },
                        {
                            sub_name : "Key Cover",
                            picture : 'Key_Covers.jpg'
                        },
                        {
                            sub_name : "Passport Holders",
                            picture : 'Passport_Holders.jpg'
                        },
                    ]
                },

                {
                    name : 'Tech',
                    sub_menu: [
                        {
                            sub_name : "Pixel Case",
                            picture : 'Pixel_Cases.jpg'
                        },
                        {
                            sub_name : "Pouches",
                            picture : 'Pouches.jpg'
                        },
                        {
                            sub_name : "Folios",
                            picture : 'Folios.jpg'
                        }
                    ]
                },
                {
                    name : 'Electricity',
                    sub_menu: [
                        {
                            sub_name : "Elecitricty 1",
                            picture : 'Pixel_Cases.jpg'
                        },
                        {
                            sub_name : "Elecitricty 2",
                            picture : 'Pouches.jpg'
                        },
                        {
                            sub_name : "Elecitricty 3",
                            picture : 'Folios.jpg'
                        }
                    ]
                },
                {
                    name: 'Hexel'
                },
                {
                    name : 'Water',
                    sub_menu: [
                        {
                            sub_name : "Water 1",
                            picture : 'Pixel_Cases.jpg'
                        },
                        {
                            sub_name : "Water 2",
                            picture : 'Pouches.jpg'
                        },
                        {
                            sub_name : "Water 3",
                            picture : 'Folios.jpg'
                        }
                    ]
                },
                {
                    name: "Righlex"
                },
                {
                    name: "Multate"
                },
                {
                    name: "Conback"
                },
                {
                    name: "Netline"
                },
                {
                    name: "Sunoun"
                },
                {
                    name: "Ratbex"
                },
            ],
            currentMode: 'dark',
            login: {
                username: 'trongnguyendev@gmail.com',
                password: 'a1234567'
            },
            currentUser: '',
            isLogged: false,
        }
    },
    methods: {
        async userLogin() {
            try {
                
                let response = await this.$auth.loginWith('laravelSanctum', {
                    data: {
                        email: this.login.username,
                        password: this.login.password
                    }
                })
                this.currentUser = response.data.data.users
                this.isLogged = this.$auth.loggedIn
            } catch (err) {
                console.log(err)
            }
        },
        toast() {
                 this.$buefy.toast.open({

                    duration: 500000,
                    message: `Something's not good, also I'm on <b>bottom</b>`,
                    position: 'is-bottom',
                    type: 'is-danger'
                })
            },

        switchForm() {
            this.form = this.form == 'login' ? 'register' : 'login'
        },
        handleScroll(){
            if(window.pageYOffset> 100){
                if(this.view.atTopOfPage) this.view.atTopOfPage = false
            }else{
                if(!this.view.atTopOfPage) this.view.atTopOfPage = true
            }
        },
        toggleMode() {
            this.$colorMode.preference = this.$colorMode.value == "light" ? "dark" : "light";
        },
    },
    
    beforeMount () {
        window.addEventListener('scroll', this.handleScroll)
    },
    

}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>