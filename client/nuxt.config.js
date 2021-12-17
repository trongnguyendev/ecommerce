import { resolve } from 'path'

export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'client',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ],
    script: [
      { src: 'https://cdn.jsdelivr.net/npm/kutty@latest/dist/kutty.min.js' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    '@/assets/css/tailwind.scss'
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: '~/plugins/bootstrap.js', mode: 'client' },
    { src: '~/plugins/vue-multiselect', mode: 'client' },
    { src: '~/plugins/vue-carousel.js', mode: 'client' },
    { src: '~/plugins/axios' },
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
    '@nuxtjs/color-mode',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
  ],

  colorMode: {
    classSuffix: ""
  },

  axios: {
    credentials: true,
    baseUrl: "http://localhost:88"  
  },

  auth: {
    redirect: {
      login: '/login',
      logout: '/',
      callback: '/',
      index: '/'
    },
    strategies: {
      'laravelJWT': {
        provider: 'laravel/jwt',
        url: 'http://localhost:88',
        endpoints: {
          login: { url: '/api/v1/auth/login'},
          refresh: { url: '/api/v1/auth/refreshToken' },
          logout: { url: '/api/v1/auth/logout' },
          user: { url: '/api/v1/auth/me' },
        },
        token: {
          property: 'access_token',
          maxAge: 60 * 60
        },
        refreshToken: {
          maxAge: 20160 * 60
        },
      },
    },
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  },

  alias: {
    'images': resolve(__dirname, './assets/images'),
    'style': resolve(__dirname, './assets/style'),
    'data': resolve(__dirname, './assets/other/data')
  },

  loading: '~/components/loading.vue',

  router: {
    extendRoutes(routes, resolve) {
      routes.push({
        name: 'custom',
        path: '*',
        component: resolve(__dirname, 'pages/404.vue')
      })
    }
  },
}
