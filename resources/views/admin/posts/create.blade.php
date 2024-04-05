<x-layout>
    <section class='px-6 py-8 max-w-4xl mx-auto'>
        <x-panel heading="Publish Your Post">
            <form action="/admin/posts" method='post' enctype="multipart/form-data">
                @csrf
                <x-form.field>
                  <x-form.label name='title' />
                    <div x-data="{ inputTitle: '{{old('title')}}' }">
                        {{-- <input class='border border-gray-400 p-2 w-full ' x-model="inputTitle" type="text" name="title" /> --}}
                        <x-form.input x-model="inputTitle" name='title'/>
                    <x-form.error name="title" />
                    <x-form.label name='slug'  class="mt-6"/>
                        <x-form.input  x-slug="inputTitle"  name="slug" />
                      <x-form.error name="slug"/>
                    </div>
                </x-form.field>
                <x-form.field>
                    <x-form.label name="thumbnail"/>
                    <x-form.input  type='file'  name='thumbnail'/>
                  <x-form.error name="thumbnail"/>
                </x-form.field>

                <x-form.field>
                    <x-form.label name="excerpt"/>
                    <x-form.input name="excerpt"/>
                   <x-form.error name="excerpt"/>
                </x-form.field>
                <x-form.field>
                    <x-form.label name='body'/>
         <x-form.textarea name="body"/>
                 <x-form.error name="body"/>
                </x-form.field>
                <x-form.field>
                    <x-form.label name='category'/>
                    <select name="category_id" id="category_id" class=' focus:outline-none focus:ring text-xs text-gray-700'>
                        <option value="" selected> Categories</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id') == $category->id? 'selected':''}}>
                            {{ ucwords($category->name)}}
                        </option>
                        @endforeach
                    </select>
               <x-form.error name="category_id"/>
                </x-form.field>
                <x-form.field>
       <x-form.button label="post" name="action" />
       <x-form.button label="save as draft" value='draft' name="action"/>
                </x-form.field>
            </form>
        </x-panel>

    </section>
    <x-flash key="success" />



</x-layout>
