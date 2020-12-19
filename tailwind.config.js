const plugin = require('tailwindcss/plugin');

module.exports = {
  "mode":"development",
    future: {
        removeDeprecatedGapUtilities: true,
    },
  purge: [],

    theme: {
        boxShadow: {
           r_s: '2px 0 8px -4px #888'
        },
        extend: {
            colors: {
                background_sidebar:'#f4f4f4',
                background_blockColor: '#f9f9f9',
                background_footer:'#f9fafc',
                background_main_block:'#1a1e25',
                b_color: '#eaeaea'
            },
            backgroundColor: theme => theme('colors'),

        },
        fontFamily: {
            'head': ['"Exo 2"', 'sans-serif'],
            'main': ['Lato', 'sans-serif']
        },



  },
  variants: {},
  plugins: [
      require('tailwindcss-pseudo-elements'),
      // require('tailwindcss-aspect-ratio')({
      //     ratios: {
      //         '16/9': [16, 9],
      //         '4/3': [4, 3],
      //         '3/2': [3, 2],
      //         '1/1': [1, 1],
      //     },
      //     variants: ['before', 'hover_before', 'responsive'],
      // }),
      plugin(function ({ addUtilities }) {
          addUtilities(
              {
                  '.empty-content': {
                      content: "''",
                  },
              },
              ['before']
          )
      }),
  ],
};
