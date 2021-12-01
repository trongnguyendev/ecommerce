<template>
    <div class="container hidden lg:block">
        <div class="bg-bg grid grid-cols-5 divide-x divide-color-1st p-7 rounded-sm">
            <div class="flex lg:flex-col xl:flex-row gap-3 xl:flex-col 2xl:flex-row justify-center">
                <ClockIcon class="text-color-1st w-11 h-11 lg:ml-auto lg:mr-auto 2xl:ml-0 2xl:mr-0" />
                <div>
                    <h4 class="text-s-18 font-semibold text-color-t lg:text-center 2xl:text-left">Free Delivery</h4>
                    <p class="text-s-14 text-color-t opacity-50 lg:text-center 2xl:text-left">For all orders over $99</p>
                </div>
            </div>

            <div class="flex lg:flex-col xl:flex-row gap-3 xl:flex-col 2xl:flex-row justify-center">
                <RefreshIcon class="text-color-1st w-11 h-11 lg:ml-auto lg:mr-auto 2xl:ml-0 2xl:mr-0" />
                <div>
                    <h4 class="text-s-18 font-semibold text-color-t lg:text-center 2xl:text-left">90 Days Return</h4>
                    <p class="text-s-14 text-color-t opacity-50 lg:text-center 2xl:text-left">If goods have problems</p>
                </div>
            </div>

            <div class="flex lg:flex-col xl:flex-row gap-3 xl:flex-col 2xl:flex-row justify-center">
                <CreditCardIcon class="text-color-1st w-11 h-11 lg:ml-auto lg:mr-auto 2xl:ml-0 2xl:mr-0" />
                <div>
                    <h4 class="text-s-18 font-semibold text-color-t lg:text-center 2xl:text-left">Secure Payment</h4>
                    <p class="text-s-14 text-color-t opacity-50 lg:text-center 2xl:text-left">100% secure payment</p>
                </div>
            </div>

            <div class="flex lg:flex-col xl:flex-row gap-3 xl:flex-col 2xl:flex-row justify-center">
                <ChatAlt2Icon class="text-color-1st w-11 h-11 lg:ml-auto lg:mr-auto 2xl:ml-0 2xl:mr-0" />
                <div>
                    <h4 class="text-s-18 font-semibold text-color-t lg:text-center 2xl:text-left">24/7 Support</h4>
                    <p class="text-s-14 text-color-t opacity-50 lg:text-center 2xl:text-left">Dedicated support</p>
                </div>
            </div>

            <div class="flex lg:flex-col xl:flex-row gap-3 xl:flex-col 2xl:flex-row justify-center">
                <GiftIcon class="text-color-1st w-11 h-11 lg:ml-auto lg:mr-auto 2xl:ml-0 2xl:mr-0" />
                <div>
                    <h4 class="text-s-18 font-semibold text-color-t lg:text-center 2xl:text-left">Gift Service</h4>
                    <p class="text-s-14 text-color-t opacity-50 lg:text-center 2xl:text-left">Support gift service</p>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>

import { ClockIcon, RefreshIcon, CreditCardIcon, ChatAlt2Icon, GiftIcon } from "@vue-hero-icons/outline"

export default {
    components: {
        ClockIcon,
        RefreshIcon,
        CreditCardIcon,
        ChatAlt2Icon,
        GiftIcon
    }
}
</script>