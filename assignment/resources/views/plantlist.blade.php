
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>plantlist</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body style="background-color:#E5E0D8;">
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

    <div class="container mx-auto">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-6" role="alert">
            <p class="font-bold">Success:</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
   
    <div class="container mx-auto flex flex-col items-center justify-center h-screen">
        <h3 class="text-center mb-4">Indoor House Plants</h3>
        <div class="flex items-center justify-center p-5">
            <a href="/plantlistadmin"> 
                <button class="text-white px-4 py-2 rounded-md" style="background-color: #B3B792;">Add New Plant</button>
            </a>
        </div>
       <ul role="list" class="divide-y divide-gray-100 w-full max-w-md">
    @foreach($plantlist as $plantlist)
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex items-center">
                <img class="h-20 w-20 flex-none rounded-full bg-gray-50" src="{{ asset($plantlist->image_url) }}" alt="">
                <div class="ml-4">
                    <p class="text-sm font-semibold leading-6 text-gray-900">
                        {{ $plantlist->name}}
                    </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500 max-w-xs">{{ $plantlist->description}}</p>
                </div>
            </div>
            <div class="flex gap-x-4">
                <a href="{{ route('plantlist.edit', $plantlist->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                <form method="post" class="text-red-600"  action="{{ route('plantlist.delete', ['plantlist' => $plantlist]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete"/>
                </form>
            </div>
        </li>
    @endforeach
</ul>
    </div>


</body>
</html>