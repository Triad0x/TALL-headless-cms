<x-mary-form wire:submit="submit">
    <x-mary-drawer
        wire:model="drawer"
        title="{{$this->drawerAttr['title']}}"
        separator
        with-close-button
        close-on-escape
        class="w-11/12 lg:w-3/6"
        right
    >
        <div class="flex flex-col gap-4">
            <x-mary-input
                type="text"
                label="Page Title"
                placeholder="insert page title"
                wire:model.live="form.title"  />
            <x-mary-input type="text" label="Page Slug" wire:model="form.slug" disabled />
            <x-mary-radio label="Select page status" wire:model="form.status" :options="$statusOpt" inline />

            <x-mary-choices-offline
                label="Post Category"
                wire:model="form.categories"
                :options="$categoryOptions"
                placeholder="Search ..."
                clearable
                searchable />

            <div class="flex flex-col" x-data>
                <!-- File Upload Container -->
                <div x-ref="fileUploadContainer">
                    <x-mary-file
                        wire:model.blur="form.image"
                        accept="image/*"
                        label="Post Image"
                        placeholder="Upload an image"
                    >
                        <div
                            x-show="!$wire.form.imageUrl && !$wire.form.image"
                            class="w-[70vw] lg:w-[30vw] aspect-video rounded-lg flex items-center justify-center text-gray-500 border-2 border-primary border-dashed cursor-pointer">
                            <x-mary-icon name="s-document-arrow-up" class="w-9 h-9 text-primary text-2xl" label="Upload" />
                        </div>
                    </x-mary-file>
                </div>
                
                <!-- Existing Image -->
                <img
                    x-show="$wire.form.imageUrl"
                    class="w-[70vw] lg:w-[30vw] aspect-video rounded-lg object-contain cursor-pointer"
                    :src="$wire.form.imageUrl" 
                    alt="Image not found"
                    @click="$refs.fileUploadContainer.querySelector('input[type=file]').click()">
                    
                <!-- New Temporary Image -->
                <div x-show="$wire.form.image">
                    <img
                        class="w-[70vw] lg:w-[30vw] aspect-video rounded-lg object-contain cursor-pointer"
                        src="{{ $this->form->image?->temporaryUrl() }}"
                        alt="Image not found"
                        @click="$refs.fileUploadContainer.querySelector('input[type=file]').click()">
                </div>
            </div>

            <x-mary-textarea label="Short Description"
                wire:model="form.shortDescription"
                placeholder="describe it ..."
                rows="10"
                hint="max 255 characters"
                maxlength="255"
            />

            <x-mary-markdown
                wire:model="form.content"
                label="Post content"
                disk="public"
                folder="posts/images" />
        </div>

        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.drawer = false" />
            <x-mary-button type="submit" label="{{$this->drawerAttr['buttonText']}}"
                class="btn-primary" icon="o-check" />
        </x-slot:actions>
    </x-mary-drawer>
</x-mary-form>

@push('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
@endpush

@push('scripts')

@endpush