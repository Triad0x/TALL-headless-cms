<x-layouts.app :title="__('Categories')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @livewire('categories.table')
        @livewire('categories.form')
    </div>
</x-layouts.app>
