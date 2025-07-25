<x-mary-card class="shadow-lg">
    <div class="flex items-center gap-3">
        <div class="w-2/6 flex justify-center items-center p-3">
            <x-mary-icon name="c-tag" class="w-full aspect-square text-primary/90" />
        </div>
        
        <div class="text-center flex-grow">
            <div class="text-xl lg:text-2xl text-base-content/50">
                Total
            </div>
            <div class="text-2xl lg:text-4xl text-primary/80">{{ $total }}</div>
            <div class="text-sm lg:text-lg text-base-content/50 whitespace-nowrap">
                Categories
            </div>
        </div>

        <div class="w-1/6 flex justify-center items-center">
            <x-mary-button
                :link="route('categories')"
                wire:navigate
                icon="o-chevron-right"
                class="btn-circle btn-outline btn-primary" />
        </div>
    </div>
</x-mary-card>