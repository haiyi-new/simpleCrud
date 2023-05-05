<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

      @unless(count($tasks) == 0)

      @foreach($tasks as $task)
      <x-listing-card :task="$task" />
      @endforeach

      @else
      <p>No Tasks found</p>
      @endunless

    </div>

    <div class="mt-6 p-4">
     {{$tasks->links()}}
    </div>
    
  </x-layout>
