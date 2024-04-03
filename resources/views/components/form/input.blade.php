@props(['name'])
<input
{{$attributes(['value'=>old($name)])}}
class='border border-gray-400 p-2 w-full '
 name="{{$name}}"
 id="{{$name}}"
 {{-- value="{{old('$name')}}" --}}
 />
