@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">

  <div class="text-dark h6"0>
    <a href="/projects" role="button">المشاريع</a>
  </div>

  <div>
    <a href="/projects/create" class="btn btn-primary px-4" role="button">مشروع جديد</a>
  </div>

</header>


<section dir="rtl">
  <div class="row">
  @forelse ($projects as $project)

    <div class="col-4 mb-4">
      <x-project-card :project='$project' />
    </div>
    
  @empty

    <div class="m-auto align-content-center text-center">
      <p>لوحة المشاريع خالية من المشاريع</p>
      <div class="mt-5">
        <a 
          href="/projects/create"
          role="button"
          class="btn btn-primary btn-lg align-items-center"
        >
          أنشئ مشروعاَ جديداَ الأن
        </a>
      </div>
    </div>

  @endforelse
  </div>

</section>

@endsection