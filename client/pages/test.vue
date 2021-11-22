<template>
    <nuxt-link to='/'>Index</nuxt-link>
</template>

<script>
export default {
  mounted() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()

      setTimeout(() => this.$nuxt.$loading.finish(), 50000)
    })
  }
}
</script>