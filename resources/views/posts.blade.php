<x-layouts.app :title="__('Posts')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @livewire('posts.table')
    </div>
</x-layouts.app>
