<template>
    <div>
        <NuxtLink
        v-if="link"
        :to="{path: href}"
        class="p-3 text-s-14 rounded-sm flex items-center gap-2 justify-center h-11"
        :class="{ 
            'text-cl-red border-[1px] bg-cl-red_2 border-cl-red': type == 'border',
            'bg-cl-red text-white' : type == 'full'
        }">
            <slot></slot>
        </NuxtLink>

        <button
        v-if="!link"
        class="p-3 text-s-14 rounded-sm flex items-center gap-2 justify-center h-11"
        :class="{ 
            'text-cl-red border-[1px] border-cl-red bg-cl-red_2': type == 'border',
            'bg-cl-red text-white' : type == 'full'
        }">
            <slot></slot>
        </button>  
    </div> 
</template>

<script>
export default {
    props: ['type', 'link', 'href'],

    data() {
        return {

        }
    },

    created() {
        console.log(this.link)
        console.log(this.href)
    }

}
</script>