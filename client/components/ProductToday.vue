<template>
    <div class="container">
        <div class="bg-bg mb-[2px] py-3 rounded-md mb-2 shadow-sm">
            <HeadingTitle name="Gợi Ý Hôm Nay" class="" />
        </div>
        <div class="grid grid-cols-auto-fit-170 lg:grid-cols-auto-fit-320 gap-4">
            <NuxtLink to="/" class="product shadow-sm rounded-sm hover:shadow-xl block" v-for="item in 20" :key="item">
                <img src="~/images/product1.jpeg" alt="" class="w-full">
                <div class="p-2 bg-bg gap-3">
                    <h1 class="text-s-12 text-color-t">Máy Phun Sương Khuêch Tán Tinh Dầu Aroma Cao Câp Tạo Ẩm Và Diệt Khuẩn</h1>
                    <div class="">
                        <div class="flex justify-between">
                            <div class="flex gap-[2px]"><StarIcon v-for="item in 5" :key="item" class="w-4 h-4 text-cl-star" /></div>
                            <span class="text-s-10 text-color-t opacity-50">Đã bán 308</span>
                        </div>
                        <div class="text-s-16 text-cl-red font-semibold flex items-center">
                            <span>26.000 ₫</span>
                            <span class="text-cl-red border-cl-red border-[1px] p-[1px] rounded-sm text-s-10 block ml-2">-35%</span>
                        </div>
                    </div>
                </div>
            </NuxtLink>
        </div>
    </div>
</template>

<script>
import { StarIcon } from "@vue-hero-icons/solid"

export default {
    components: {
        StarIcon
    },
    data() {
        return {
            product: []
        }
    }
}
</script>