<x-layout>
      <section class='px-6 py-8 max-w-md mx-auto'>
<x-panel>
      <form action="/admin/posts" method='post' enctype="multipart/form-data">
@csrf
<div class="mb-6">
                              <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                             
<div x-data="{ inputTitle: '{{old('title')}}' }" >
  <input
  class='border border-gray-400 p-2 w-full ' 
    x-model="inputTitle"
    type="text"
   name="title"
  />
  @error('title')
  <p class="text-xs text-red-500 mt-1">{{$message}}</p>
  @enderror
  <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">Slug</label>
  <input
  class='border border-gray-400 p-2 w-full' 
    x-slug="inputTitle"
    type="text"
   name="slug"
  />
  @error('slug')
  <p class="text-xs text-red-500 mt-1">{{$message}}</p>
  @enderror
</div>
                        </div>
                        <div class="mb-6">
                        <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                              <input class='border border-gray-400 p-2 w-full' 
                              type='file' id='thumbnail' name='thumbnail' value="{{old('thumbnail')}}" >
                              @error('thumbnail')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div>
                        <div class="mb-6">
                              <!-- <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label> -->
                              <!-- @error('slug')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror -->
                        </div>
                        <div class="mb-6">
                              <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                              <input class='border border-gray-400 p-2 w-full' 
                              type='text' id='excerpt' name='excerpt' value="{{old('excerpt')}}" >
                              @error('excerpt')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div>
                        <div class="mb-6">
                              <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                              <textarea class='border border-gray-400 p-2 w-full' id='body' name='body'  >{{old('body')}}</textarea>
                              @error('body')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div>
                        <div class="mb-6">
                              <select name="category_id" id="category_id" class=' focus:outline-none focus:ring text-xs text-gray-700'>
                                    <option value="" selected>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                    {{old('category') == $category->id? 'selected':''}}
                                    >
                                       {{ ucwords($category->name)}}
                                    </option>
                                    @endforeach
                              </select>
                              @error('category_id')
  <p class="text-xs text-red-500">{{$message}}</p>
  @enderror
                        </div>
                        <div class="mb-6">
                              <button type='submit' class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>Post</button>
                        </div>

      </form>
</x-panel>

</section>
<x-flash key="success"/>



</x-layout>