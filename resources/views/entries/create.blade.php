@section('title', 'New entry')
@extends('layout')

@section('content')

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Create a new entry</h3>
        <p class="mt-1 text-sm text-gray-600">
          How are you feeling today?
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{ route('entries.store') }}" method="POST">
      @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="text" name="date" id="date" placeholder="2021-12-05" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 px-3">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="mood" class="block text-sm font-medium text-gray-700">Mood</label>
                <select id="mood_id" name="mood_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($moods as $mood)
                      <option value="{{ $mood->id }}">{{ $mood->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-span-6">
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                <textarea name="notes" id="notes" class="mt-1 px-3 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
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
              Create
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
@endsection