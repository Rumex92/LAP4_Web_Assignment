<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>

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
                <span class="sr-only">Your Company</span>
                <h3>ThePlantGallery</h3>
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
    <div class="flex items-center justify-center py-6">
        <h1 class="text-4xl font-semibold text-gray-900">Gallery</h1>
    </div>
</header>

<section class="py-6 dark:bg-gray-800 dark:text-gray-50">
    <div class="container grid grid-cols-2 gap-4 p-4 mx-auto md:grid-cols-4">
        <!-- Image elements go here -->
        <img src="https://www.plantandflowerinfo.com/images/aglaonema-silver-bay-plants-close.jpg" alt="" class="w-full h-full col-span-2 row-span-2 rounded shadow-sm min-h-96 md:col-start-3 md:row-start-1 dark:bg-gray-500 aspect-square">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/pothos-marble-queen-plant.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/dracaena-marginata-house-plant.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/sansevieria-houseplant.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/pachira-indoor-house-plant300250.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/pothos-houseplant.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/fittonia-house-plants.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/philodendron-silver-trailing-house-plant.jpg">
		<img alt="" class="w-full h-full rounded shadow-sm min-h-48 dark:bg-gray-500 aspect-square" src="https://www.plantandflowerinfo.com/images/chinese-evergreen-plant-care.jpg">
		<img src="https://www.plantandflowerinfo.com/images/ficus-lyrata-fiddle-leaf-fig.jpg" alt="" class="w-full h-full col-span-2 row-span-2 rounded shadow-sm min-h-96 md:col-start-1 md:row-start-3 dark:bg-gray-500 aspect-square">
    </div>
</section>

</body>
</html>
