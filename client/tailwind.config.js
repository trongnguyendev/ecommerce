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
        '12'  : '0.75rem',
        '13'  : '0.8125rem',
        '14'  : '0.875rem',
        '16'  : '1rem',
        '18'  : '1.125rem',
        '30'  : '1.875rem'
      },
      colors: {
        'color-1st'     : 'var(--color-1st)',
        'color-2nd'     : 'var(--color-2nd)',
        'color-t'       : 'var(--color-text)',
        'bg'            : 'var(--bg)',
        'bg-container'  : 'var(--bg-container)',
        'divider'       : 'var(--divider)',
        'border'        : 'var(--border)',
      }
    },
    fontFamily: false,
  },
  variants: {
    extend: {
      display: ['dark']
    },
  },
  plugins: [],
}
