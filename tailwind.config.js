// tailwind.config.js
module.exports = {
    mode: 'jit',
    purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),
      // other plugins as needed
    ],
  };
  