/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js}", "./app/views/**/*.php"],
  theme: {
    extend: { boxShadow: { st: "0 2px 5px 1px rgba(64,60,67,.16)" } },
  },
  plugins: [],
};
