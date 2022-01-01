<template>
    <NuxtLink to="/" class="relative product rounded-sm hover:shadow-xl block">
        <img :src="require('/assets/images/' + picture)" alt="" class="w-full">
        <div class="p-2 bg-bg gap-3">
            <h1 class="text-s-12 text-color-t line-clamp h-9">{{ title }}</h1>
            <div class="">
                <div class="flex justify-between">
                    <RateStar :stars="star" />
                    <span class="text-s-10 text-color-t opacity-50">Đã bán {{ bought }}</span>
                </div>
                <div class="text-s-16 text-cl-red font-semibold flex items-center">
                    <span v-if="discount == 0">{{ price }} ₫</span>
                    <span v-if="discount > 0">{{ discount }} ₫</span>
                    <del v-if="discount > 0" class="text-s-13 font-normal ml-2 text-color-t opacity-60">{{ price }} ₫</del>
                </div>
            </div>
        </div>
        <span v-if="discount > 0 && percent > 0" class="special text-center text-s-14 absolute right-0 top-0 text-cl-red py-1 px-1 text-s-10 block ml-2 bg-color-1st">
            {{ percent }}%
            <span class="text-white text-s-14 block">GIẢM</span>
            
        </span>
        <!-- <span class="absolute right-2 top-2 text-cl-red border-cl-red border-[1px] py-[1px] px-[2px] rounded-sm text-s-10 block ml-2 bg-cl-red_2">{{ percent }}%</span> -->
    </NuxtLink>
</template>

<script>
export default {
    props: [ 'title', 'price', 'discount', 'percent', 'star', 'bought', 'picture' ],
}
</script>