<template>
    <div class="container">
        <div class="bg-bg mb-[2px] py-3 rounded-md mb-2 shadow-sm">
            <HeadingTitle name="SẢN PHẨM NỔI BẬT" class="" />
        </div>
        <div class="grid grid-cols-auto-fit-170 lg:grid-cols-auto-fit-320 gap-4">
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
</template>

<script>
import { StarIcon } from "@vue-hero-icons/solid"

export default {
    components: {
        StarIcon
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