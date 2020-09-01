module.exports = {
  "mode":"development",
    future: {
        removeDeprecatedGapUtilities: true,
    },
  purge: [],

    theme: {

        extend: {
            colors: {
                background_sidebar:'#f1f3f6',
                background_blockColor: '#f9f9f9',
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
