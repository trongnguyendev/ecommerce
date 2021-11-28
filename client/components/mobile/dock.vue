<template>
    <div class="w-full flex lg:hidden justify-around px-4 h-12 bg-bg border-divider border-t-4 fixed bottom-0 left-0">
        <NuxtLink to="/" class="w-1/4 text-center">
            <HomeIcon class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Trang chu</h3>
        </NuxtLink>

        <NuxtLink to="/" class="w-1/4 text-center">
            <ViewGridIcon class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Danh muc</h3>
        </NuxtLink>

        <NuxtLink to="/" class="w-1/4 text-center">
            <SearchIcon class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Tim kiem</h3>
        </NuxtLink>

        <NuxtLink to="/" class="w-1/4 text-center">
            <IconsCart class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Gio hang</h3>
        </NuxtLink>
        
    </div>
</template>
<script>
import { HomeIcon, ViewGridIcon, SearchIcon } from "@vue-hero-icons/outline"
export default {
    components: {
        HomeIcon,
        ViewGridIcon,
        SearchIcon
    }
    
}
</script>