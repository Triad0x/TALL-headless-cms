<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <livewire:dashboard.post-count />
            <livewire:dashboard.page-count />
            <livewire:dashboard.category-count />
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-lg">
            <x-livewire-filemanager />
        </div>
    </div>
    @push('scripts')
        @filemanagerScripts
    @endpush
</x-layouts.app>
