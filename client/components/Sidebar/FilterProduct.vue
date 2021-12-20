<template>
    <div class="side">
        <!-- category vertical -->
        <div class="w-full gap-3 p-4 grid">
            <h2 class="text-color-t font-bold text-s-14">DANH MỤC SẢN PHẨM</h2>
            <ul class="list list-flush gap-2">
                <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Ống Kính - Ống Ngắm</NuxtLink>
                </li>
                <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Ống Kính (Lens)</NuxtLink>
                </li>
                <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Máy Bay Camera và Phụ Kiện</NuxtLink>
                </li>
                    <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Máy Bay Camera</NuxtLink>
                </li>
                    <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Máy Bay Camera</NuxtLink>
                </li>
                    <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Máy Bay Camera</NuxtLink>
                </li>
                    <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Máy Bay Camera</NuxtLink>
                </li>
                <li class="">
                    <NuxtLink to="/" class="block text-s-13 text-color-t">Thiết Bị Quay Phim</NuxtLink>
                </li>
            </ul>
        </div>
        <!-- end category vertical -->

        <!-- brand vertical -->
        <div class="w-full gap-3 p-4 grid">
            <h2 class="text-color-t font-bold text-s-14">THƯƠNG HIỆU</h2>
            <ul class="list list-flush gap-2">
                <li class="">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox w-3 h-3 rounded-none border-gray-400">
                        <span class="ml-2 cursor-pointer text-s-13 text-color-t">ADIDAS</span>
                    </label>
                </li>
                <li class="">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox w-3 h-3 rounded-none border-gray-400">
                        <span class="ml-2 cursor-pointer text-s-13 text-color-t">ADIDAS</span>
                    </label>
                </li>
                <li class="">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox w-3 h-3 rounded-none border-gray-400">
                        <span class="ml-2 cursor-pointer text-s-13 text-color-t">ADIDAS</span>
                    </label>
                </li>
                <li class="">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox w-3 h-3 rounded-none border-gray-400">
                        <span class="ml-2 cursor-pointer text-s-13 text-color-t">ADIDAS</span>
                    </label>
                </li>
                <li class="">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox w-3 h-3 rounded-none border-gray-400">
                        <span class="ml-2 cursor-pointer text-s-13 text-color-t">ADIDAS</span>
                    </label>
                </li>
            </ul>
        </div>
        <!-- end brand vertical -->

        <!-- rate filter -->
        <div class="w-full gap-3 p-4 grid">
            <h2 class="text-color-t font-bold text-s-14">ĐÁNH GIÁ</h2>
            <div class="grid gap-2">
                <div class="flex items-center rate-5 cursor-pointer">
                    <StarIcon v-for="item in 5" :key="item" class="w-5 h-5 text-cl-star" />
                    <span class="ml-2 text-color-t text-s-13">từ 5 sao</span>
                </div>
                <div class="flex items-center rate-4 cursor-pointer">
                    <StarIcon v-for="item in 4" :key="item" class="w-5 h-5 text-cl-star" />
                    <StarIcon v-for="item in 1" :key="item" class="w-5 h-5 text-gray-300" />
                    <span class="ml-2 text-color-t text-s-13">từ 4 sao</span>
                </div>
                <div class="flex items-center rate-3 cursor-pointer">
                    <StarIcon v-for="item in 3" :key="item" class="w-5 h-5 text-cl-star" />
                    <StarIcon v-for="item in 2" :key="item" class="w-5 h-5 text-gray-300" />
                    <span class="ml-2 text-color-t text-s-13">từ 3 sao</span>
                </div>
            </div>
        </div>
        <!-- end rate filter -->

        <!-- price filter -->
        <div class="w-full gap-3 p-4 grid">
            <h2 class="text-color-t font-bold text-s-14">GIÁ</h2>
            <div class="">
                <span class="badge bg-gray-100 text-gray-900 text-s-13 font-normal">Dưới 200.000</span>
                <span class="badge bg-gray-100 text-gray-900 text-s-13 font-normal">Từ 200.000 đến 400.000</span>
                <span class="badge bg-gray-100 text-gray-900 text-s-13 font-normal">Từ 400.000 đến 800.000</span>
                <span class="badge bg-gray-100 text-gray-900 text-s-13 font-normal">Trên 800.000</span>
            </div>
            <div class="grid gap-2">
                <p class="text-s-13 text-color-t opacity-50">Chọn khoảng giá</p>
                <div class="flex gap-3 items-center">
                    <input class="form-input form-input-sm w-24" id="name" type="number" value="0">
                    -
                    <input class="form-input form-input-sm w-24" id="name" type="number" value="0">
                </div>
                <button class="px-2 py-1 text-color-1st hover:text-white border-[1px] w-28 border-color-1st bg-bg hover:bg-color-1st block text-s-13 text-center rounded-sm">
                    Áp dụng
                </button>
            </div>
        </div>
        <!-- end price filter -->
    </div>
</template>

<script>
import { StarIcon, XIcon} from "@vue-hero-icons/solid"
export default {
    components: {
        StarIcon,
        XIcon,
    },
}
</script>