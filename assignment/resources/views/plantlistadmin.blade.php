
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body style="background-color: #E5E0D8;">
    <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
       
          <h3>ThePlantGallery<h3>
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
      <a href="/home" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
        <a href="/gallery" class="text-sm font-semibold leading-6 text-gray-900">Gallery</a>
        <a href="/plantlist" class="text-sm font-semibold leading-6 text-gray-900">Plant Lists</a>
       
      </div>
     
    </nav>

   
    @if(session('error'))
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-5" role="alert">
    <p class="font-bold">Error:</p>
    <p>{{ session('error') }}</p>
  </div>
@endif

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">

<div class="form">
<form action="/plantlist/create" method="POST" enctype="multipart/form-data">


   @csrf
  
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
     

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
          

              <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
               
            </div>
          
          </div>
          @error('name')
            <p class="text-black-450 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-full">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          @error('description')
            <p class="text-black-450 text-sm">{{ $message }}</p>
            @enderror
        
<br>
<div class="sm:col-span-4">
    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image Upload</label>
    <div class="mt-2">
        <input type="file" name="image" id="image" accept="image/*" class="block w-full border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
    </div>
</div>


        <br>
        
        <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" style="background-color: #B3B792;" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
              </div>
             
</form>
</div>
</div>



</body>
</html>