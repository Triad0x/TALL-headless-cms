<x-layouts.app :title="__('Pages')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @livewire('pages.table')
        @livewire('pages.form')
    </div>
</x-layouts.app>
