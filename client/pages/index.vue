<template>
  <div class="grid gap-6 py-4">

    <BannerSlide />

    <SiteFeature />

    <BannerBody />
    
    <CategoryFeature />

    <SubBanner />

    <!-- <ProductToday /> -->

    <ProductByCategory />

    <!-- <ProductByCategory />

    <ProductByCategory /> -->

    
  </div>
</template>

<script>

import { AdjustmentsIcon, BeakerIcon } from "@vue-hero-icons/outline"

export default {
  components: {
    AdjustmentsIcon,
    BeakerIcon
  },

  created() {
    // console.log(this.$auth.loggedIn);
  },

  data(){
      return {
          carousels: [
              { text: 'Slide 1', color: 'primary' },
              { text: 'Slide 2', color: 'info' },
              { text: 'Slide 3', color: 'success' },
              { text: 'Slide 4', color: 'warning' },
              { text: 'Slide 5', color: 'danger' }
          ]
      }
  },
  
  methods: {
    toggle() {
      this.$colorMode.preference = this.$colorMode.value == "light" ? "dark" : "light";
      },
  },

  mounted() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()

      setTimeout(() => this.$nuxt.$loading.finish(), 500)
    })
  }
}
</script>
