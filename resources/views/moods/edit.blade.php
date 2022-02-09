@section('title', 'Update mood')
@extends('layout')

@section('content')

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-2">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Edit mood</h3>
        <p class="mt-1 text-sm text-gray-600">
          Remember, this will affect all entries currently using this mood.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{ route('moods.update', $mood->id) }}" method="POST">
      @csrf
      @method('PATCH')
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                <input type="text" name="color" id="color" value="{{ $mood->color }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 px-3">
                <span class="text-gray-400 text-xs">HEX code or string</span>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Mood</label>
                <input type="text" name="name" id="name" value="{{ $mood->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 px-3">
              </div>
            </div>
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 mt-8 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Please fix the following issues with your input:</strong>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
            @endif
          </div>
          
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</body>


</html>
@endsection