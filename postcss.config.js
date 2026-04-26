// Tailwind CSS v4 is wired up via @tailwindcss/vite in vite.config.js,
// so no PostCSS plugin entry is required here. Autoprefixer remains for
// non-Tailwind CSS in the legacy frontend bundle.
module.exports = {
    plugins: {
        autoprefixer: {},
    },
};
