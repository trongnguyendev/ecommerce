<template>
    <div class="container bg-container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb py-2 rounded">
            <li class="breadcrumb-item"><NuxtLink to="/"><span class="text-s-14 text-color-t">Trang chủ</span></NuxtLink></li>
            <li class="breadcrumb-item text-s-14" aria-current="page">Máy Ảnh - Máy Quay Phim</li>
            </ul>
        </nav>

        <div class="grid grid-cols-5 bg-bg rounded-md">
            <div class="side col-span-1">
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
                            <input class="form-input form-input-sm" id="name" type="number" value="0">
                            -
                            <input class="form-input form-input-sm" id="name" type="number" value="0">
                        </div>
                        <button class="px-2 py-1 text-color-1st hover:text-white border-[1px] w-28 border-color-1st bg-bg hover:bg-color-1st block text-s-13 text-center rounded-sm">
                            Áp dụng
                        </button>
                    </div>
                </div>
                <!-- end price filter -->

            </div>
            <div class="col-span-4 p-4">
                <div class="top-banner-product grid gap-3">
                    <h1 class="text-color-t text-s-24 font-thin mb-2">Máy Ảnh - Máy Quay Phim</h1>
                    <img alt="" src="~/images/banner_small4.png" class="w-full rounded-md">

                    <div class="filter-product flex gap-3 bg-bg-container rounded-sm items-center p-3">
                        <h2 class="text-s-13 text-color-t opacity-70">Sắp xếp theo</h2>
                        <div class="flex cursor-pointer gap-3 ">
                            <div class="inline-block bg-color-1st text-white text-s-13 p-2 px-3 rounded-sm">Phổ Biến</div>
                            <div class="inline-block text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">Mới nhất</div>
                            <div class="inline-block text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">Bán Chạy</div>
                            <div class="inline-block text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">Giá Thấp</div>
                            <div class="inline-block text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">Giá Cao</div>
                        </div>
                    </div>

                    <div class="filter-selected">
                        <span class="badge bg-bg-container border-[1px] border-color-1st font-thin text-color-t">
                            Từ 200.000 đến 400.000
                            <button class="btn btn-xs btn-icon text-current hover:bg-red-200 badge-close"><XIcon /></button>
                        </span>
                        <span class="badge bg-bg-container border-[1px] border-color-1st font-thin text-color-t">
                            Máy Ảnh
                            <button class="btn btn-xs btn-icon text-current hover:bg-red-200 badge-close"><XIcon /></button>
                        </span>
                        <span class="text-color-t text-s-13 ml-3 opacity-70 cursor-pointer">Xóa tất cả</span>
                    </div>

                    <div class="grid grid-cols-auto-fit-170 gap-4">
                        <div v-for="product in products" :key="product.title">
                            <ProductItem
                            :title="product.title"
                            :price="product.price"
                            :discount="product.discount"
                            :percent="product.percent"
                            :star="product.star"
                            :bought="product.bought"
                            :picture="product.picture"
                            />
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
import { StarIcon, XIcon } from "@vue-hero-icons/solid"
export default {
    components: {
        StarIcon,
        XIcon
    },

    data() {
        return {
            products: [
                { title: 'title 1', price: '35.000', discount: '26.000', percent: '35', star: 1.7, bought: '313', picture: 'product1.jpeg' },
                { title: 'title 2', price: '125.000', discount: '100.000', percent: '27', star: 3, bought: '400', picture: 'product6.png' },
                { title: 'title 3', price: '99.000', discount: '0', percent: '0', star: 2.5, bought: '33', picture: 'product4.jpeg' },
                { title: 'title 4', price: '235.000', discount: '150.000', percent: '78', star: 2, bought: '29', picture: 'product5.jpeg' },
                { title: 'title 3', price: '99.000', discount: '78.000', percent: '30', star: 2.5, bought: '33', picture: 'product4.jpeg' },
                { title: 'title 4', price: '235.000', discount: '150.000', percent: '78', star: 2, bought: '29', picture: 'product5.jpeg' },
                { title: 'title 3', price: '99.000', discount: '78.000', percent: '30', star: 2.5, bought: '33', picture: 'product4.jpeg' },
                { title: 'title 4', price: '235.000', discount: '150.000', percent: '78', star: 2, bought: '29', picture: 'product5.jpeg' },
                { title: 'title 3', price: '99.000', discount: '78.000', percent: '30', star: 2.5, bought: '33', picture: 'product4.jpeg' },
                { title: 'title 4', price: '235.000', discount: '150.000', percent: '78', star: 2, bought: '29', picture: 'product5.jpeg' },
                { title: 'title 3', price: '99.000', discount: '78.000', percent: '30', star: 2.5, bought: '33', picture: 'product4.jpeg' },
                { title: 'title 4', price: '235.000', discount: '150.000', percent: '78', star: 2, bought: '29', picture: 'product5.jpeg' },
            ]
        }
    }
}
</script>