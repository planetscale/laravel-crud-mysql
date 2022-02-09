@section('title', 'Home')
@extends('layout')

@section('content')
  <div class="grid grid-cols-6">
    <div class="moods col-span-4 gap-2">
      <div class="grid grid-cols-2 lg:grid-cols-6 gap-2">
        @foreach($entries as $entry)
        <a href="/entries/{{$entry->id}}">
          <div class="w-16 h-16 justify-center items-center flex" style="background-color:{{ $entry->mood->color }}">
            <span class="text-black text-lg">
              {{ \Carbon\Carbon::parse($entry->date)->format('m/d') }}
            </span>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    <div class="legend col-span-2 pl-0 md:pl-20">
      <span class="font-bold">Legend</span>
      <ul>
      @foreach($moods as $mood)
        <li>
          <span class="w-3 h-3 inline-block" style="background-color:{{ $mood->color }}"></span>
          {{ $mood->name }}
        </li>
      @endforeach
      </ul> 
    </div>
  </div>
</body>
</html>
@endsection