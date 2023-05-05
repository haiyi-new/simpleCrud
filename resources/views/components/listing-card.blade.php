@props(['task'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$task->logo ? asset('storage/' . $task->logo) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/tasks/{{$task->id}}">{{$task->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$task->company}}</div>
      <x-listing-tags :tagsCsv="$task->tags" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$task->location}}
      </div>
    </div>
  </div>
</x-card>
