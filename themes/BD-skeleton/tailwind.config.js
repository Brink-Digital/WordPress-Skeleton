/** @type {import('tailwindcss').Config} */
module.exports = {
content: [
	'./*.php',
	'./components/**/*.php',
	'./templates/**/*.php',
	'./blocks/**/*.php',
	'./blocks/**/*.js',
	'./blocks/**/*.css',
	'./assets/scripts/**/*.js', // Include JS files
	'./assets/styles/**/*.css', // Include CSS files
],
theme: {
	extend: {},
},
plugins: [],
}

