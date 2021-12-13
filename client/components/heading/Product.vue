<template>
    <div class="flex border-t-4 border-color-1st items-center relative before-heading">
        <NuxtLink to="/" class="text-s-16 bg-color-1st text-white text-center relative font-bold after-heading p-2 mr-8">MÀN HÌNH MÁY TÍNH</NuxtLink>
        <div class="flex divide-x divide-color-t items-center">
            <div 
            class="text-s-14 text-color-t hover:text-color-1st text-center px-3 cursor-pointer"
            :class="{ 'active-menu': menu_current == 'a' }"
            @click="clickSubmenu('a')"
            >
                BÀN PHÍM CƠ CHƠI GAME
            </div>
            <div 
            class="text-s-14 text-color-t hover:text-color-1st text-center px-3 cursor-pointer"
            :class="{ 'active-menu': menu_current == 'b' }"
            @click="clickSubmenu('b')"
            >
                CHUỘT CHƠI GAME
            </div>
            <div 
            class="text-s-14 text-color-t hover:text-color-1st text-center px-3 cursor-pointer"
            :class="{ 'active-menu': menu_current == 'c' }"
            @click="clickSubmenu('c')"
            >
                TAI NGHE CHƠI GAME
            </div>
            <div 
            class="text-s-14 text-color-t hover:text-color-1st text-center px-3 cursor-pointer"
            :class="{ 'active-menu': menu_current == 'd' }"
            @click="clickSubmenu('d')"
            >
                GHẾ CHƠI GAME
            </div>
        </div>
    </div>
</template>

<script>
import { ChevronRightIcon } from "@vue-hero-icons/outline"

export default {
    components: {
        ChevronRightIcon
    },

    props: [ '' ],

    data() {
        return {
            menu_current: ''
        }
    },

    methods: {
        clickSubmenu(menu) {
            this.menu_current = menu
        }
    }
}
</script>
