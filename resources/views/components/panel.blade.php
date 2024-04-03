@props(['heading'])
<div
{{$attributes(['class'=>'p-5  border border-gray-200 rounded-xl'])}}>
<h1 class='text-center font-bold text-xl'>{{$heading}}</h1>
      {{$slot}}
</div>
