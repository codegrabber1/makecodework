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
                b_color: '#eaeaea'
            },
            backgroundColor: theme => theme('colors'),

        },
        fontFamily: {
            'head-font': ['Roboto Condensed', 'sans-serif'],
            'main-font': ['Lato', 'sans-serif']
        },



  },
  variants: {},
  plugins: [],
};
