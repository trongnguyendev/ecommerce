<template>
  <div>
    <BeakerIcon class="h-5 w-5 text-blue-500"/>
    <AdjustmentsIcon />
    
    <div x-data="drawer()">
      <button class="btn btn-primary" x-spread="trigger">Open Drawer</button>
      <div class="dialog" x-spread="drawer" x-cloak>
        <div class="drawer-content">
          <div class="dialog-header">Drawer Title
            <button type="button" class="btn btn-light btn-sm btn-icon" aria-label="Close" @click="close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
          </div>
          <div class="dialog-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam eius fugiat illum repudiandae commodi inventore magnam unde vero cupiditate molestiae?</div>
          <div class="dialog-footer">
            <button type="button" class="btn btn-light" x-on:click="close">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="space-y-2" aria-live="assertive" aria-atomic="true">
  <div class="w-9/12 h-4 bg-gray-200 rounded animate-pulse"></div>
  <div class="w-11/12 h-4 bg-gray-200 rounded animate-pulse"></div>
  <div class="w-8/12 h-4 bg-gray-200 rounded animate-pulse"></div>
</div>
<div class="spinner" role="status">
  <span class="sr-only">Loading...</span>
</div>
<nav class="tab tab-full">
  <a class="tab-link active" href="#">Settings</a>
  <a class="tab-link" href="#">Integrations</a>
  <a class="tab-link" href="#">Notifications</a>
</nav>

<div class="fixed text-white bg-gray-900 bottom-5 right-5 toast" role="alert" x-on:toast1.window="open = !open" x-data="{ open: false }" x-show.transition="open" x-cloak>
  <div class="flex items-center justify-between mb-1">
    <span class="font-bold">Toast Title</span>
    <button class="btn btn-dark btn-xs" @click="open = false"><svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
  </div>
  This is a toast message that shows up whenever you want.
</div>

<button @click="$dispatch('toast1')" class="btn btn-primary">Show Toast</button>



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
