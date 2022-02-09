@section('title', 'Mood')
@extends('layout')

@section('content')

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
      Mood
    </h3>
    <a href="/moods/{{ $mood->id }}/edit" class="text-gray-400 text-xs text-right">Edit</a>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">
          Name
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ $mood->name }}
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">
            Color
        </dt>
        
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span class="flex-shrink-0 h-6 w-6 p-2" style="background-color:{{ $mood->color }}">{{ $mood->color }}</span>
        </dd>
      </div>
    </dl>
  </div>
</div>
</body>
</html>
@endsection