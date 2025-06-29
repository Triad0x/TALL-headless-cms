<x-mary-form wire:submit="submit">
    <x-mary-drawer
        wire:model="drawer"
        title="{{$this->drawerAttr['title']}}"
        separator
        with-close-button
        close-on-escape
        class="w-11/12 lg:w-1/3"
        right
    >
        <x-mary-input type="text" label="Category Name" wire:model="form.name" />
    
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.drawer = false" />
            <x-mary-button type="submit" label="{{$this->drawerAttr['buttonText']}}"
                class="btn-primary" icon="o-check" />
        </x-slot:actions>
    </x-mary-drawer>
</x-mary-form>