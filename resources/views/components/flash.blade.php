@props(['key'])
@if(session()->has($key))
        <div 
        x-data="{show:true}"
        x-init="setTimeout(()=>show=false,4000)"
        x-show="show"
        class="fixed bottom-3 right-3 py-3 px-2 text-xs bg-green-100 rounded-xl ">
            <p>{{session($key)}}</p>
</div>
        @endif