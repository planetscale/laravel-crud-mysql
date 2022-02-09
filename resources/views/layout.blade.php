<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - Mood Tracker</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="h-full">
    <div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a class="text-2xl font-bold text-white" href="/">Year in Pixels</a>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="/moods" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Moods</a>

              <a href="/entries" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Entries</a>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
      <a href="/moods/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white mx-6 bg-stone-500 hover:bg-stone-700">
        New mood 
      </a>
      <a href="/entries/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
        New entry
      </a>
    </div>
      </div>
    </div>
  </nav>

  <main>
    <div class="container mx-auto px-8 py-16">
      @yield('content')
    </div>
  </main>
</div> 
    </body>
</html>