<div>
    <x-mary-card title="{{ ucfirst($model) }} List" class="mb-4">
        <x-slot:menu>
            <x-mary-button
                x-show="$wire.actionButtons.create"
                icon="o-plus" class="btn-circle btn-sm"
                @click="$dispatch('create-data')"
            />
        </x-slot:menu>
        <x-mary-table
            :headers="$headers"
            :rows="$items"
            :sort-by="$sortBy"
            with-pagination
            per-page="perPage"
            :per-page-values="[10, 25, 50, 100]"
        >
            @scope('cell_status', $item)
                <x-mary-badge :value="$item->status"
                :class="$item->status === 'published' ? 'badge-success' : 'badge-error'" />
            @endscope
            @scope('cell_actions', $item)
                <x-mary-button
                    x-show="$wire.actionButtons.detail"
                    class="btn-primary btn-circle btn-outline btn-soft"
                    icon="o-eye"
                    @click="$dispatch('show-detail', {id: {{$item->id}} });"
                />
                <x-mary-button
                    x-show="$wire.actionButtons.edit"
                    class="btn-warning btn-circle btn-outline btn-soft"
                    icon="o-pencil"
                    @click="$dispatch('edit-data', {id: {{$item->id}} });"
                />
                <x-mary-button
                    x-show="$wire.actionButtons.delete"
                    class="btn-error btn-circle btn-outline btn-soft" icon="o-trash" @click="$wire.onDelete({{$item->id}})"/>
            @endscope
        </x-mary-table>
    </x-mary-card>


    <!-- delete modal -->
    <x-mary-modal wire:model="deleteModal" :title="'Delete '.$model.'?'" class="backdrop-blur">
        You're about to delete this {{ $model }}.
        This action cannot be reversed.
    
        <x-slot:actions>
            <x-mary-button label="Cancel" class="btn-soft" @click="$wire.deleteModal = false" />
            <x-mary-button label="Delete" class="btn-error btn-soft btn-outline" @click="$wire.delete" />
        </x-slot:actions>
    </x-mary-modal>
</div>