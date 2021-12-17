<template>
    <header
    class="bg-color-1st duration-75 transition"
    :class="{ 'scrolled': !view.atTopOfPage, 'relative': view.atTopOfPage }" 
    >
        <div class="container">
            <!-- header top -->
            <div class="header__top flex justify-between items-center md:py-6 py-2">
                <NuxtLink to="/" class="block logo flex w-52 mr-14">
                    <img src="~/images/logo.png" alt="" class="w-full m-auto">
                </NuxtLink>
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
                    
                    <NuxtLink to="/login" class="flex ml-7 cursor-pointer items-center" v-if="!$auth.loggedIn">
                        <!-- <UserCircleIcon class="w-8 h-8 stroke-0 font-thin" /> -->
                        <div class="avatar bg-color-1st text-black border-black border-2 avatar-sm"><UserIcon class="w-8 h-8 stroke-0 font-thin" /></div>
                        <div class="ml-1 hidden xl:block" >
                            <h5 class="text-s-13">Đăng nhập</h5>
                            <h5 class="text-s-13">Đăng kí</h5>
                        </div>
                    </NuxtLink>

                    <div class="flex ml-7 cursor-pointer items-center" v-if="$auth.loggedIn">
                        <!-- <div class="avatar bg-color-1st text-black border-black border-2 avatar-sm">TN</div>
                        <div class="ml-1 hidden xl:block" v-if="$auth.loggedIn">
                            
                            <button @click="userLogout">Logout</button>
                        </div> -->

                        <div x-data="dropdown()" class="relative">
                            <div x-spread="trigger" class="flex items-center gap-2">
                                <div class="avatar bg-black text-color-1st avatar-sm">{{ nameUser }}</div>
                                <div>
                                    <span class="text-s-11">Tài khoản</span>
                                    <h5 class="text-s-14">{{ $auth.user.user.name }}</h5>
                                </div>
                            </div>
                            <div class="dropdown-list bg-bg px-0 dark:border-bg" x-spread="dropdown" x-cloak>
                                <ul class="list list-flush">
                                    <li class="text-color-t hover:bg-gray-200 dark:hover:bg-gray-500 text-s-12 p-3">Đơn hàng của tôi</li>
                                    <li class="text-color-t hover:bg-gray-200 dark:hover:bg-gray-500 text-s-12 p-3">Tài khoản của tôi</li>
                                    <li class="text-color-t hover:bg-gray-200 dark:hover:bg-gray-500 text-s-12 p-3">
                                        Thông báo của tôi
                                        <span class="badge bg-red-700 text-white text-s-10 p-1 text-center">17</span>
                                    </li>
                                    <li class="text-color-t hover:bg-gray-200 dark:hover:bg-gray-500 text-s-12 p-3" @click="userLogout"><button> Thoát tài khoản </button></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
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
    
    computed: {
        isLoggedCurrent() {
            return this.$auth.loggedIn ? true : false
        },
        nameUser() {
            let fullname = this.$auth.user.user.name;
            let position_space = fullname.indexOf(" ");
            let name = fullname.substring(0,1)
            let name2 = fullname.substring(position_space+1, position_space+2)
            return name + name2
        }
    },
    created() {
        this.getAuthenticatedUser()
    },

    methods: {
        async getAuthenticatedUser () {
        //   console.log('loggedIn : ' + this.$auth.loggedIn)
        //   console.log(this.$auth.fetchUser())
        //   try {
        //     this.$axios.setToken('123', 'Bearer')
        //     let response = await this.$axios.$get('/api/v1/user')
        //   } catch (err) {
        //     console.log(err)
        //   }
        },
        async userLogout() {
            try {
                
                let response = await this.$auth.logout('laravelSanctum')
                this.currentUser = ''
                this.isLogged = false
                // this.$router.push('/login')
            } catch (err) {
                console.log(err)
            }
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