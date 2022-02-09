@section('title', 'Moods')
@extends('layout')

@section('content')
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Color
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($moods as $mood)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-4">
                  <div class="flex-shrink-0 h-10 w-10" style="background-color:{{ $mood->color }}">
                  </div>
                  </div>
                </div>
              </td>
              <td class="px-4 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                
                  <div class="text-sm font-medium text-gray-500">
                    {{ $mood->name }}
                    </div>
                </div>
              </td>
              
              <td class="px-4 py-4 text-right text-sm font-medium">
                <a href="/moods/{{ $mood->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-4 py-4 text-right text-sm font-medium">
                <form action="{{ route('moods.destroy', $mood->id) }}" method="POST">
                @csrf
                @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>


</html>
@endsection