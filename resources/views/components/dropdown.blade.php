@props(['trigger'])
<div x-data="{ show: false }" class="w-full">
    <div @click="show=!show">

        {{ $trigger }}
    </div>
    <div class="py-2 absolute bg-gray-100 z-50 w-full text-left text-sm rounded-xl my-2 " x-show="show"
        style="display: none">
        {{ $slot }}

    </div>
</div>
