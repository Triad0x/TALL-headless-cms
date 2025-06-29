<div>
    @livewire('data-table', [
        'model' => 'page',
        'headers' => $headers,
    ])

    <x-mary-drawer
        wire:model="drawer"
        title="Page Details"
        separator
        with-close-button
        close-on-escape
        class="w-11/12 lg:w-1/3"
        right
    >
        @if ($data)
            <h1 class="font-bold text-2xl lg:text-4xl mb-2">{{ $data->title }}</h1>
            <div class="flex flex-row justify-between items-center mt-4">
                <div class="w-2/3 text-sm text-gray-500">
                    <p>
                        <span class="font-semibold">Slug:</span> {{ $data->slug }}
                    </p>
                    <p>
                        <span class="font-semibold">Created:</span> {{ $data->created_at->format('d M Y H:i') }}
                    </p>
                    <p>
                        <span class="font-semibold">Updated:</span> {{ $data->updated_at->format('d M Y H:i') }}
                    </p>
                </div>
                <x-mary-badge :value="$data->status"
                    class="font-bold"
                    :class=" $data->status === 'published' ? 'badge-success' : 'badge-error'" />
            </div>
            
            <p class="mt-16">{!! $data->body !!}</p>
        @endif
    </x-mary-drawer>
</div>