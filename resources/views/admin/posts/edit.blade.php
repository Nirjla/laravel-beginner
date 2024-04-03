<x-layout>
    <section class='px-6 py-8 max-w-4xl mx-auto'>
        <x-panel :heading="'Edit Your Post: '. $post->title">
            <form action="/admin/posts/{{$post->id}}/update" method='post' enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <x-form.field>
                  <x-form.label name='title' />
                    <div x-data="{ inputTitle: '{{old('title',$post->title)}}' }">
                        {{-- <input class='border border-gray-400 p-2 w-full ' x-model="inputTitle" type="text" name="title" /> --}}
                        <x-form.input x-model="inputTitle" name='title'
                    />
                    <x-form.error name="title" />
                    <x-form.label name='slug'  class="mt-6"/>
                        <x-form.input  x-slug="inputTitle"  name="slug" />
                      <x-form.error name="slug"/>
                    </div>
                </x-form.field>
                <x-form.field>
                    <x-form.label name="thumbnail"/>
                    <x-form.input  type='file'  name='thumbnail'/>
                    <div class="mt-4 ">
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="rounded-xl" width="100">
                </div>
                  <x-form.error name="thumbnail"/>
                </x-form.field>

                <x-form.field>
                    <x-form.label name="excerpt"/>
                    <x-form.input name="excerpt"
                    :value='old("excerpt",$post->excerpt)'/>
                   <x-form.error name="excerpt"/>
                </x-form.field>
                <x-form.field>
                    <x-form.label name='body'/>
         <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>
                 <x-form.error name="body"/>
                </x-form.field>
                <x-form.field>
                    <x-form.label name='category'/>
                    <select name="category_id" id="category_id" class=' focus:outline-none focus:ring text-xs text-gray-700'>
                        <option value="" selected> Categories</option>
                        <option value="{{$post->category->id}}" {{old('category_id',$post->category->id) == $post->category->id? 'selected':''}}>
                            {{ ucwords($post->category->name)}}
                        </option>
                    </select>
               <x-form.error name="category_id"/>
                </x-form.field>
                <x-form.field>
       <x-form.button name="post"/>
                </x-form.field>

            </form>
        </x-panel>

    </section>
    <x-flash key="success" />



</x-layout>
