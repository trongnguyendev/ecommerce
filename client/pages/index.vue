<template>
  <div>
      <BeakerIcon class="h-5 w-5 text-blue-500"/>
      <AdjustmentsIcon />

    <div class="bg-white dark:bg-gray-800">
      <h1 class="text-gray-900 dark:text-white">Dark mode is here!</h1>
      <p class="text-gray-600 dark:text-gray-300">
        Lorem ipsum...
      </p>
    </div>
    <button @click="toggle()">
      dark mode  
    </button>
    <Tutorial/>
  </div>
</template>

<script>

import { AdjustmentsIcon, BeakerIcon } from "@vue-hero-icons/outline"

export default {
  components: {
    AdjustmentsIcon,
    BeakerIcon
  },
  
  methods: {
    toggle() {
      this.$colorMode.preference = this.$colorMode.value == "light" ? "dark" : "light";
      },
  },

  mounted() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()

      setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })
  }
}
</script>
