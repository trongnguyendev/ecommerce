<template>
    <div class="container bg-bg-container">
        <Breadcrumb />

        <div class="grid grid-cols-12 grid-cols-auto-fit bg-bg rounded-sm p-4 gap-9">

            <!-- picture product -->
            <div class="col-span-12 lg:col-span-4">
                <img 
                :src="require('/assets/images/' + pictureCurrent)"
                class="w-full mb-2 rounded-sm cursor-pointer" alt=""
                @click="index = pictureIndex">

                <CoolLightBox 
                :items="pictureLight" 
                :index="index"
                @close="index = null">
                </CoolLightBox>

                <client-only>
                    <carousel
                    class="overflow-hidden rounded-sm picture-product"
                    :perPage="2"
                    :navigationEnabled="true"
                    :paginationEnabled="false"
                    :perPageCustom="[[640, 2], [768, 3], [1024, 4], [1280, 6], []]"
                    >
                        <slide v-for="(product, productIndex) in products" :key="productIndex" class="px-1">
                            <img 
                            :src="require('/assets/images/' + product)" alt=""
                            class="w-full cursor-pointer rounded-sm"
                            @click="targetPicture(product, productIndex)">
                        </slide>
                    </carousel>
                </client-only>
            </div>

            
            <!-- infor product -->
            <div class="col-span-12 lg:col-span-8 gap-6 flex flex-col">

                <div>
                    <!-- brand product -->
                    <div class="flex gap-2 items-center">
                        <span class="text-s-12 text-color-t">Thương hiệu:</span>
                        <span class="text-color-1st text-s-14">Samsung</span>
                    </div>
                    <!-- title product -->
                    <h1 class="text-color-t text-s-24 max-w-[800px]">Kem Che Khuyết Điểm Focallure Độ Che Phủ Cao/ Chống Thấm Nước/ Giữ Màu Lâu Trôi 4.3g</h1>
                </div>
                
                <!-- infor other -->
                <div class="flex items-center divide-x">
                    <div class="flex items-center gap-1 pr-4">
                        <span class="text-cl-star font-black text-s-16">5.0</span>
                        <RateStar :stars="2.4" />
                    </div>

                    <div class="flex items-center gap-1 px-4">
                        <span class="font-medium text-s-14 text-color-t">21</span>
                        <span class="text-s-14 opacity-50 text-color-t">Đánh Giá</span>
                    </div>

                    <div class="flex items-center gap-1 px-4">
                        <span class="font-medium text-s-14 text-color-t">75</span>
                        <span class="text-s-14 opacity-50 text-color-t">Đã Bán</span>
                    </div>
                </div>

                <!-- price product -->
                <div class="bg-bg-container p-4 flex items-center gap-3">
                    <span class="text-s-30 text-cl-red">1.489.000 ₫</span>
                    <del class="opacity-30 text-color-t">2.510.000 ₫</del>
                    <span class="text-white text-s-10 bg-cl-red p-1 font-bold px-2 rounded-sm">44% GIẢM</span>
                </div>

                <!-- option delivery product -->
                <div class="flex items-center">
                    <span class="text-color-t w-36 opacity-50 text-s-14">Vận Chuyển</span>
                    <div class="flex gap-2 text-s-14 items-center text-color-t">
                        <TruckIcon class="w-6 h-6 opacity-50" stroke-width="1" />
                        <span class="opacity-50">Vận Chuyển Tới</span>
                        <span class="font-bold">Phường An Khánh, Quận 2 - TP Thủ Đức, Hồ Chí Minh</span>
                    </div>
                </div>

                <!-- option size product -->
                <div class="flex">
                    <span class="text-color-t w-36 opacity-50 text-s-14">Kích cỡ</span>
                    <div class="items-center gap-3 grid grid-cols-5">
                        <div
                        v-for="item in sizes" :key="item" 
                        class="relative overflow-hidden hover:border-color-1st hover:text-color-1st size w-20 h-8 bg-bg-container border-[1px] cursor-pointer rounded-sm text-center py-1 text-color-t"
                        :class="[ item == size ? 'border-color-1st text-color-1st' : '' ]"
                        @click="chooseSize(item)"
                        >
                            {{ item }}
                            <div class="bg-color-1st absolute -bottom-3 -right-2 rotate-45 py-2 px-1" v-if="size != 0 && item == size">
                                <CheckIcon class="w-3 h-3 text-white -rotate-45 -translate-x-1 font-bold" />
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- option colour product -->
                <div class="flex">
                    <span class="text-color-t w-36 opacity-50 text-s-14">Màu sắc</span>
                    <div class="items-center gap-3 grid grid-cols-5">
                        <div
                        class="colour w-7 h-7 rounded-full bg-bg-container cursor-pointer py-1 text-center"
                        :style="{ background: item.color }"
                        v-for="item in colours" :key="item.name" 
                        @click="chooseColour(item.name)"
                        >
                            <CheckIcon class="w-5 h-5 text-white font-bold m-auto" v-if="item.name === colour" />
                        </div>
                        
                    </div>
                </div>

                <!-- option quantity product -->
                <div class="flex items-center">
                    <span class="text-color-t w-36 opacity-50 text-s-14">Số Lượng</span>
                    <div class="flex divide-x border-[1px] rounded-sm">
                        <button class="p-2"><MinusIcon class="w-4 h-4 text-color-t" /></button>
                        <input type="text" name="" value="0" id="" class="input px-2 w-11 text-center bg-bg text-color-t">
                        <button class="p-2"><PlusIcon class="w-4 h-4 text-color-t" /></button>
                    </div>
                </div>

                <div class="flex gap-4">
                    <FormButton type="border" :link="false">
                        <IconsCart />
                        Thêm Vào Giỏ Hàng
                    </FormButton>

                    <FormButton type="full" :link="true" href="/cart" class="w-32">
                        Mua Ngay
                    </FormButton>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { CheckIcon, MinusIcon, PlusIcon, TruckIcon } from "@vue-hero-icons/outline"
import ProductCarousel from 'vue-product-carousel'

export default {
    components: {
        CheckIcon,
        MinusIcon,
        PlusIcon,
        TruckIcon,

        ProductCarousel
    },
    
    data() {
        return {
            size: 0,
            colour: '',
            sizes: [ '36', '37', '38', '39', '40', '41', '42' ],
            colours: [ 
                { name: 'red', color: '#d10e0e' },
                { name: 'yellow', color: '#c7a21b' },
                { name: 'green', color: '#18d7b4' }
            ],
            index: null,

            pictureIndex: 0,

            pictureCurrent: 'product1.jpeg',
            products: [
                'product1.jpeg',
                'product4.jpeg',
                'product5.jpeg',
                'product1.jpeg',
                'product4.jpeg',
                'product5.jpeg',
                'product1.jpeg',
                'product4.jpeg',
                'product5.jpeg',
            ],

            pictureLight: [],
        }
    },

    mounted() {
        this.pictureLight = this.products.map(function(img) {
            return require('/assets/images/' + img) 
        })
    },
    created() {
        
    },

    computed: {
    },

    methods: {
        chooseSize(size) {
            this.size === size ? this.size = 0 : this.size = size
        },
        chooseColour(colour) {
            this.colour === colour ? this.colour = '' : this.colour = colour
        },
        targetPicture(picture, index) {
            this.pictureCurrent = picture
            this.pictureIndex = index
        }
    }
}
</script>