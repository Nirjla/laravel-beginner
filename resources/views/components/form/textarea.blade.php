@props(['name'])
<textarea class='border border-gray-400 p-2 w-full' id='{{$name}}' name='{{$name}}'>{{$slot ?? old($name)}}</textarea>
