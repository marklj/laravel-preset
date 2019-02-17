# 🚀 Shore Laravel Preset

_Forked from Adam Wathan's Laravel Frontend Preset_

This preset includes:

- [Tailwind CSS](https://tailwindcss.com)
- [postcss-nesting](https://github.com/jonathantneal/postcss-nesting) for nested CSS support
- [Purgecss](https://www.purgecss.com/), via [spatie/laravel-mix-purgecss](https://github.com/spatie/laravel-mix-purgecss)
- [Vue.js](https://vuejs.org/)
- Removes Bootstrap and jQuery
- Adds compiled assets to `.gitignore`
- Adds a simple Tailwind-tuned default layout template
- Add support for Server-side apps with client-side rendering. Learn more at [https://reinink.ca/articles/server-side-apps-with-client-side-rendering]
- Replaces the `welcome.blade.php` template with a full page vue component template.

## Installation

This package isn't on Packagist (yet), so to get started, add it as a repository to your `composer.json` file:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/marklj/laravel-preset"
    }
]
```

Next, run this command to add the preset to your project:

```
composer require shore/laravel-preset --dev
```

Finally, apply the scaffolding by running:

```
php artisan preset shore
```