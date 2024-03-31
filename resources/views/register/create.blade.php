<x-layout>
      <section class="px-6 py-6">
            <main class='max-w-lg mx-auto'>
                  <x-panel>
                  <h1 class='text-center font-bold text-xl'>Register here!</h1>
                  <form method='post' action='/register' class='mt-10'>
                        @csrf
                        <div class="mb-6">
                              <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                              <input class='border border-gray-400 p-2 w-full' type='text' id='name' name='name' value="{{old('name')}}" required>
                              @error('name')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div>
                        <div class="mb-6">
                              <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                              <input class='border border-gray-400 p-2 w-full' type='text' id='username' name='username' value="{{old('username')}}" required/>
                              @error('username')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div>
                        <div class="mb-6">
                              <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                              <input class='border border-gray-400 p-2 w-full' type='email' id='email' name='email' value="{{old('email')}}" required/>
                              @error('email')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div>
                      
                        <div class="mb-6">
                              <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                              <input class='border border-gray-400 p-2 w-full' type='password' id='password' name='password'  required/>
                              @error('password')
                              <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                              @enderror
                        </div> 
                        <div class="mb-6">
                              <button type='submit' class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>Submit</button>
                        </div>
</form>
</x-panel>
</main>
      </section>
</x-layout>