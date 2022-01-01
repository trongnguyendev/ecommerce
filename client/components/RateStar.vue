<template>
    <div class="flex ">
        <StarIcon v-for="item in starCurrent" :key="item" class="w-4 h-4 text-cl-star" />
        <div class="flex" v-if="starHalf">
            <IconsStarHalf class="w-[13px] h-4 text-cl-star" />
            <IconsStarHalfNot class="w-[14px] h-4 ml-[-13px] text-gray-300 rotatey-180" />
        </div>
        <div v-if="starRemain != 0" class="flex">
            <StarIcon v-for="item in starRemain" :key="item" class="w-4 h-4 text-gray-300" />
        </div>
    </div>
</template>

<script>
import { StarIcon } from "@vue-hero-icons/solid"
export default {
    props: ['stars'],
    
    data() {
        return {
            starCurrent: 0,
            starRemain: 0,
            starHalf: false
        }
    },
    components: {
        StarIcon
    },

    mounted() {       
        this.starRemain = Math.floor(5 - this.stars)
        this.starCurrent = this.stars
        this.changeStar(this.stars)
    },

    methods: {
        isTypeInt(n) {
            return n % 1 == 0
        },

        changeStar(star) {
            if( !this.isTypeInt(this.stars)) {
                this.starHalf = true
                this.starCurrent = Math.floor(this.stars)
            }
        }
    }

}
</script>