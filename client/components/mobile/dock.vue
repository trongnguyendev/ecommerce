<template>
    <div class="w-full flex lg:hidden justify-around px-4 h-12 bg-bg border-divider border-t-4 fixed bottom-0 left-0 z-20">
        <NuxtLink to="/" class="w-1/4 text-center">
            <HomeIcon class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Trang chu</h3>
        </NuxtLink>

        <NuxtLink to="/" class="w-1/4 text-center">
            <ViewGridIcon class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Danh muc</h3>
        </NuxtLink>

        <div x-data="drawer()">
            <NuxtLink to="/" class="w-1/4 text-center" x-spread="trigger">
                <SearchIcon class="text-color-t m-auto" />
                <h3 class="text-s-11 text-color-t">Tim kiem</h3>
            </NuxtLink>
            <div class="dialog dialog-full" x-spread="drawer" x-cloak>
                <div class="drawer-content">
                    <div class="dialog-header bg-color-1st">
                        <ChevronLeftIcon x-on:click="close" class="text-white" />
                        <div class="form-icon">
                            <SearchIcon />
                            <input class="form-input" placeholder="Search for posts...">
                        </div>
                        
                        <NuxtLink to="/cart" x-on:click="close" class="relative">
                            <IconsCart class="text-color-t m-auto text-white font-bold" />
                            <!-- <span class="absolute top-[-2px] right-[-10px] bg-black text-white block w-4 h-4 text-s-11 pt-[2px] rounded-full text-center">0</span> -->
                        </NuxtLink>
                        
                        <!-- <button type="button" class="btn btn-light btn-sm btn-icon" aria-label="Close" x-on:click="close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> -->
                    </div>
                    <div class="dialog-body p-0">
                         <ul class="list list-flush">
                            <li class="list-item font-bold">
                                <div class="flex text-s-13 items-center">
                                    <img src="~/images/search.png" class="w-9 mr-4" alt="">Reddit
                                </div>
                            </li>
                            <li class="list-item font-bold">
                                <div class="flex text-s-13 items-center">
                                    <img src="~/images/search.png" class="w-9 mr-4" alt="">Reddit
                                </div>
                            </li>
                            <li class="list-item font-bold">
                                <div class="flex text-s-13 items-center">
                                    <img src="~/images/search.png" class="w-9 mr-4" alt="">Reddit
                                </div>
                            </li>
                            <li class="list-item font-bold">
                                <div class="flex text-s-13 items-center">
                                    <img src="~/images/search.png" class="w-9 mr-4" alt="">Reddit
                                </div>
                            </li>
                            <li class="list-item font-bold">
                                <div class="flex text-s-13 items-center">
                                    <img src="~/images/search.png" class="w-9 mr-4" alt="">Reddit
                                </div>
                            </li>
                            <li class="list-item font-bold">
                                <div class="flex text-s-13 items-center">
                                    <img src="~/images/search.png" class="w-9 mr-4" alt="">Reddit
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="dialog-footer">
                        <button type="button" class="btn btn-light" x-on:click="close">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>

        <NuxtLink to="/" class="w-1/4 text-center">
            <IconsCart class="text-color-t m-auto" />
            <h3 class="text-s-11 text-color-t">Gio hang</h3>
        </NuxtLink>
        
    </div>
</template>
<script>
import { HomeIcon, ViewGridIcon, SearchIcon } from "@vue-hero-icons/outline"
import { ChevronLeftIcon } from "@vue-hero-icons/solid"

export default {
    components: {
        HomeIcon,
        ViewGridIcon,
        SearchIcon,
        ChevronLeftIcon
    }
    
}
</script>