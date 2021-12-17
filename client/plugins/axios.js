// export default ({ $axios, env }) => {
//     $axios.onRequest(config => {
//       config.headers.common['Authorization'] = `Bearer ${env.WP_API_KEY}`;
//     });
//   }

  export default function ({ $axios, redirect, env }) {
    $axios.onRequest(config => {
    config.headers.common['Authorization'] = `Bearer ${env.WP_API_KEY}`;
      console.log('Making request to ' + config.url)
      console.log('Config' + config)
    })
  
    $axios.onError(error => {
      const code = parseInt(error.response && error.response.status)
      if (code === 400) {
        redirect('/400')
      }
    })
  }