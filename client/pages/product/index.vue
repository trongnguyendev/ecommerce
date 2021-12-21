<template>
    <div class="container bg-container">
        <Breadcrumb class="hidden lg:flex" />

        <div class="grid grid-cols-5 bg-bg rounded-md">
            <SidebarFilterProduct class="col-span-1 hidden lg:block" />
            
            <div class="col-span-5 lg:col-span-4 p-2 lg:p-4">
                <div class="top-banner-product grid gap-3">
                    <h1 class="text-color-t text-s-24 font-thin mb-2">Máy Ảnh - Máy Quay Phim</h1>
                    <!-- <img alt="" src="~/images/banner_small4.png" class="w-full rounded-md"> -->

                    <div class="filter-product flex lg:gap-3 bg-bg-container rounded-sm items-center p-1 lg:p-3">
                        <h2 class="text-s-13 text-color-t opacity-70 hidden lg:block w-28">Sắp xếp theo</h2>
                        <div class="flex cursor-pointer lg:gap-3 justify-around md:justify-start w-full">
                            <div class="bg-color-1st text-white text-s-13 p-2 px-3 rounded-sm">Phổ Biến</div>
                            <div class="text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">Mới nhất</div>
                            <div class="text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">Bán Chạy</div>
                            <div class="flex text-color-t text-s-13 p-2 px-3 rounded-sm bg-bg">
                                Giá
                                <div class="flex items-center ml-2">
                                    <ArrowNarrowUpIcon class="w-4 h-4" />
                                    <ArrowNarrowDownIcon class="w-4 h-4"/>
                                </div>
                            </div>
                        </div>

                        <div class="items-center ml-auto hidden lg:flex">
                            <div class="text-s-13 text-color-t mr-2">1/10</div>
                            <div class="bg-bg border-gray-200 border-[1px] p-1 cursor-pointer opacity-70"><ChevronLeftIcon class="font-thin text-color-t" /></div>
                            <div class="bg-bg border-gray-200 border-[1px] p-1 cursor-pointer"><ChevronRightIcon class="font-thin text-color-t" /></div>
                        </div>
                    </div>

                    <div class="filter-selected flex items-center">
                        <!-- filter mobile -->
                        <div x-data="drawer()">
                            <button class="btn text-color-1st lg:hidden flex items-center" x-spread="trigger"><BeakerIcon class="w-5 h-5 mr-2" /> Lọc</button>
                            <div class="dialog dialog-sm" x-spread="drawer" x-cloak>
                                <div class="drawer-content">
                                    <div class="dialog-header bg-color-1st px-4">
                                        <span class="m-auto font-bold text-white text-s-18">Lọc sản phẩm</span>
                                        <button type="button" class="btn btn-light btn-sm btn-icon bg-transparent" aria-label="Close" x-on:click="close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                    </div>
                                    <div class="dialog-body p-0">
                                        <SidebarFilterProduct />
                                    </div>
                                    <div class="dialog-footer">
                                        <button type="button" class="btn btn-light" @click="close">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end filter mobile -->
                        <div class="hidden lg:flex items-center gap-3">
                            <div class="badge bg-bg-container border-[1px] border-color-1st font-thin text-color-t">
                            Từ 200.000 đến 400.000
                            <button class="btn btn-xs btn-icon text-current hover:bg-red-200 badge-close"><XIcon /></button>
                            </div>
                            <div class="badge bg-bg-container border-[1px] border-color-1st font-thin text-color-t">
                                Máy Ảnh
                                <button class="btn btn-xs btn-icon text-current hover:bg-red-200 badge-close"><XIcon /></button>
                            </div>
                            <div class="text-color-t text-s-13 ml-3 opacity-70 cursor-pointer">Xóa tất cả</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-auto-fit-150 lg:grid-cols-auto-fit-170 gap-4">
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

                    <!-- pagination -->
                    <nav class="pagination justify-end" role="navigation" aria-label="pagination">
                        <a href="#" class="pagination-link text-color-t" aria-label="Goto previous page"><svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg></a>
                        <a href="#" class="pagination-link text-color-t" aria-label="Goto page 1">1</a>
                        <a href="#" class="pagination-link text-color-t" aria-label="Goto page 2">2</a>
                        <a href="#" class="pagination-link pagination-active" aria-label="Page 5" aria-current="page">5</a>
                        <a href="#" class="pagination-link text-color-t" aria-label="Goto page 6">6</a>
                        <a href="#" class="pagination-link text-color-t" aria-label="Goto next page"><svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></i></a>
                    </nav>
                    <!-- end pagination -->
                </div>

            </div>
        </div>

    </div>
</template>

<script>
import { StarIcon, XIcon, ChevronRightIcon, ChevronLeftIcon, ArrowNarrowUpIcon, ArrowNarrowDownIcon } from "@vue-hero-icons/solid"
import { BeakerIcon } from "@vue-hero-icons/outline"

export default {
    components: {
        StarIcon,
        XIcon,
        ChevronRightIcon,
        ChevronLeftIcon,
        BeakerIcon,
        ArrowNarrowUpIcon,
        ArrowNarrowDownIcon
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