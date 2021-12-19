module.exports = {
  mode: 'jit',
  purge: [
    './public/**/*.html',
    './pages/**/*.{js,jsx,ts,tsx,vue}',
    './layouts/**/*.{js,jsx,ts,tsx,vue}',
  ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      fontSize: {
        's-10'  : '0.625rem',
        's-11'  : '0.688rem',
        's-12'  : '0.75rem',
        's-13'  : '0.8125rem',
        's-14'  : '0.875rem',
        's-16'  : '1rem',
        's-18'  : '1.125rem',
        's-24'  : '1.5rem',
        's-30'  : '1.875rem'
      },
      colors: {
        'color-1st'     : 'var(--color-1st)',
        'color-2nd'     : 'var(--color-2nd)',
        'color-t'       : 'var(--color-text)',
        'color-gray'    : '#666',
        'bg'            : 'var(--bg)',
        'bg-container'  : 'var(--bg-container)',
        'divider'       : 'var(--divider)',
        'border'        : 'var(--border)',
        'from-radient'  : '136deg, rgb(240, 248, 255) -1%',
        'to-radient'    : 'rgb(219, 238, 255) 85%',
        'cl-star'          : 'var(--yellow)',
        'cl-red'          : 'var(--red)',
        'cl-red_2'      : 'var(--red_2)',

        primary: {
          // light: "#fefcbf", // For lighter primary color
          DEFAULT: "var(--color-1st)", // Normal primary color
          // dark: "#744210", // Used for hover, active, etc.
        },
      },
      backgroundImage: {
        'banner-register' : "url('~/assets/images/banner_register.png')",
      },
      gridTemplateColumns: {
        'auto-fit': 'repeat(auto-fit, minmax(100px, 1fr))',
        'auto-fit-320': 'repeat(auto-fit, minmax(210px, 1fr))',
        'auto-fit-170': 'repeat(auto-fit, minmax(170px, 1fr))',
      },
      gridTemplateRows: {
        'repeat-2': 'repeat(2, minmax(100px, 1fr))'
      },
      height: {
        '67' : '16.813rem'
      },
    },
    fontFamily: false,
    container: {
      center: true,
      padding: {
        DEFAULT: '2rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    gradientColorStops: theme => ({
      ...theme('colors'),
      'primary': 'gb(240, 248, 255) -1%,',
      'secondary': 'rgb(219, 238, 255) 85%',
     })

  },
  variants: {
    extend: {
      display: ['dark']
    },
  },
  plugins: [
    require("kutty")
  ],
}
