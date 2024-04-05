@props(['label'])
<button type='submit' class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'
{{$attributes}}
value='{{$label}}'
>{{ucwords($label)}}</button>
