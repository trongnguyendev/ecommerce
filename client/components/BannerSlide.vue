<template>
    <div class="container banner flex gap-4">
        <client-only>
            <carousel
            class="overflow-hidden rounded-sm w-full h-full"
            :perPage="1"
            :navigationEnabled="true"
            :paginationEnabled="false"
            >
                <slide v-for="item in banner" :key="item.name">
                    <div class="min-h-full bg-cover h-[333px]" :style="{ backgroundImage: 'url(' + require('@/assets/images/' + item.name) + ')' }"></div>
                </slide>
            </carousel>

            <div class="banner_small hidden lg:flex flex-col min-w-[320px] gap-4">
                <NuxtLink to="/"><img src="~/images/banner_small1.jpg" alt="" class="w-full rounded-sm"></NuxtLink>
                <NuxtLink to="/"><img src="~/images/banner_small2.jpg" alt="" class="w-full rounded-sm"></NuxtLink>
            </div>

            <comments slot="placeholder" class="w-full bg-gray-400 h-[333px] rounded-sm" />

        </client-only>
        
    </div>
</template>

<script>
export default {
    data() {
        return {
            banner: [
                { name: 'banner_1.jpg' },
                { name: 'banner_2.jpg' },
                { name: 'banner_3.jpg' }
            ]
        }
    },
    mounted() {
        if(process.client) {
            console.log('client');
        }
        console.log('....');
        if(process.server) {
            console.log('server');
        }
    }
    
}
</script>