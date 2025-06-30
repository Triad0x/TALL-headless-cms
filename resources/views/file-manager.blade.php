<x-layouts.app.lfm :title="__('File Manager')">
    <x-livewire-filemanager />
    
    @push('scripts')
        @filemanagerScripts
    @endpush
</x-layouts.app.lfm>

