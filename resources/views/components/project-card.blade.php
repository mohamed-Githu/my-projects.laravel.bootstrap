@props(['project', 'full'])

<div class="card" dir="rtl">
  <div class="card-body">
    <div class="status">

      @switch($project->status)
        @case(1)
          <span class="text-success">مكتمل</span>
          @break
        @case(2)
          <span class="text-danger">ملغي</span>
          @break
        @default
          <span class="text-warning">قيد الإنجاز</span>
      @endswitch

      <h5 class="font-weight-bold card-title mb-2">
        <a href="/projects/{{$project->id}}">{{ $project->title }}</a>
      </h5>

      <div class="card-text mb-2">
        {{ isset($full) ? $project->description : Str::limit($project->description, 150) }}
      </div>

    </div>

    
  </div>
  <div class="card-footer">
    <div class="d-flex align-items-center justify-content-between">

      <div class="d-flex align-items-center">
        <i style="fill: red; width: 15px;" class="bi bi-clock"></i>
        <div class="me-1">
          {{ $project->created_at->diffForHumans() }}
        </div>
      </div>

      <div class="d-flex align-items-center me-5">
        <i class="bi bi-list-check"></i>
        <div class="me-1">
          {{ count($project->tasks) }}
        </div>
      </div>

      <div class="me-auto">
        <form action="/projects/{{ $project->id }}" method="post" id="delete-project-{{ $project->id }}">
          @csrf
          @method('DELETE')

          <i
            class="bi bi-trash cursor-pointer"
            style="cursor: pointer;"
            onclick="document.querySelector('#delete-project-{{ $project->id }}').submit()"
          ></i>
        </form>
      </div>

    </div>
  </div>
</div>