/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/*.blade.php",
        "./resources/views/components/*.blade.php",
        "./resources/js/*.js"
    ],
    theme: {
        extend: {},
        fontFamily: {
            'sans': ['"Open Sans"', 'sans-serif']
        },
    },
    plugins: [],
}
