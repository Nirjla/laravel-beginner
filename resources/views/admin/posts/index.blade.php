<x-layout>
    <section class='px-6 py-8 max-w-4xl mx-auto'>
        <x-panel heading="All Posts">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($posts as $post)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$post->title}}</div>
                  <div class="text-sm text-gray-500">{{$post->category->name}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{$post->status?'Published':'Draft'}}  
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  Admin
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="/admin/posts/{{$post->id}}/edit" class="text-blue-400 hover:text-blue-500">Edit</a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <form action="/admin/posts/{{$post->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="text-sm font-medium text-red-400 hover:text-red-500">Delete</button>

            </form>
                  </td>
              </tr>
@endforeach
              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


        </x-panel>
    </section>
    <x-flash key='success'/>
</x-layout>
