<template>
    <header
    class="bg-bg duration-75 transition"    >
        <div class="container">
            <!-- header top -->
            <div class="header__top flex items-center md:py-6 py-2">
                <NuxtLink to="/" class="block logo flex w-52 mr-8">
                    <img src="~/images/logo.png" alt="" class="w-full m-auto">
                </NuxtLink>
                <h2 class="text-color-t text-s-30">Đăng nhập</h2>
            </div>
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
}
</script>