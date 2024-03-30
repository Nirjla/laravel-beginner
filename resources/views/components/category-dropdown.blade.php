<x-dropdown>
    <x-slot name="trigger">
        <button class="inline-flex lg:w-full bg-gray-100 rounded-xl py-2 px-3 text-sm font-semibold">
            {{-- {{ $current_category ? 'true' : 'false' }} --}}
            {{ isset($current_category) ? ucwords($current_category->name) : 'Categories' }}
            <x-icon name='arrow-down' class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>
    <x-dropdown-link href='/?{{http_build_query(request()->except("category","page"))}}' :active="request()->routeIs('home')">
        All
    </x-dropdown-link>
    @foreach ($categories as $category)
        {{-- @dd(request()) --}}
        <x-dropdown-link href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
            :active="request()->is('/?category=' . $category->slug)">
            {{ $category->name }}
        </x-dropdown-link>
    @endforeach
</x-dropdown>
