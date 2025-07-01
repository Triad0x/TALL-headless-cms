## Blog Headless CMS
A simple headlesss cms build using Tailwind Alpine.js Laravel Livewire
with MaryUI and FluxUI Component.

File media Manager using [Livewire File Manager](https://github.com/livewire-filemanager/filemanager)

## How to setup project (Laravel Sail)

    composer install
    cp .env.example .env
    sail up -d
    sail artisan migrate --seed
    sail artisan key:generate
    sail artisan storage:link
    sail npm run build

> Api doc at: {domain}/docs

 Default  Account
 `test@example.com | password`



