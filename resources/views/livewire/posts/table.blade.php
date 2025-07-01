<div>
    @livewire('data-table', [
        'model' => 'post',
        'headers' => $headers,
    ])

    <x-mary-drawer
        wire:model="drawerDetail"
        title="Post Details"
        separator
        with-close-button
        close-on-escape
        class="w-11/12 lg:w-1/3"
        right
    >
        @if ($data)
            <h1 class="font-bold text-2xl lg:text-4xl mb-2">{{ $data->title }}</h1>
            <div class="w-2/3 text-sm text-gray-500">
                {{ $data->slug }}
            </div>
            <div class="flex flex-row justify-between items-center mt-4">
                <div class="w-2/3 text-sm text-gray-500">
                    <p>
                        <span class="font-semibold">Created:</span> {{ $data->created_at->format('d M Y H:i') }}
                    </p>
                    <p>
                        <span class="font-semibold">Updated:</span> {{ $data->updated_at->format('d M Y H:i') }}
                    </p>
                    @if ($data->published_at)
                        <p>
                            <span class="font-semibold">Published:</span> {{ $data->updated_at?->format('d M Y H:i') }}
                        </p>
                    @endif
                </div>
                <x-mary-badge :value="$data->status"
                    class="font-bold"
                    :class=" $data->status === 'published' ? 'badge-success' : 'badge-error'" />
            </div>

            <div class="flex flex-wrap gap-2 my-4">
                @foreach($data->categories as $category)
                    <x-mary-badge 
                        :value="$category->name" 
                        class="badge-primary badge-soft"
                    />
                @endforeach
            </div>
            
            @if ($data->image)
                <div class="mt-4">
                    <img src="{{ $data->image_url }}" alt="image for: {{ $data->title }}"
                        class="w-full h-auto rounded-lg shadow-md">
                </div>
            @endif

            <p class="mt-16">{!! $data->short_description !!}</p>
            <p class="mt-16">{!! $data->html_content !!}</p>
        @endif
    </x-mary-drawer>
</div>