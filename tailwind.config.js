module.exports = {
  purge: {
    enabled: true,
    content: [
      "./app/views/**/*.{php,html}",
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      backgroundColor: ['odd'],
      backgroundColor: ['even'],
      backgroundColor: ['checked'],
      borderColor: ['checked'],
    },
  },
  plugins: [],
}
