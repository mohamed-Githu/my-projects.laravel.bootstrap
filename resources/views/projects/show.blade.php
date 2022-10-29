@props(['project'])

@extends('layouts.app')

@section('title', $project->title)

@section('content')
  <header>
    <div class="d-flex justify-content-between align-items-center my-5" dir="rtl">
      <h3>المشاريع / {{ $project->title }}</h3>

      <div>
        <a href="/projects/{{$project->id}}/edit" role="button" class="btn btn-primary px-4">
          تعديل المشريع
        </a>
      </div>
    </div>
  </header>
  <section class="row text-right" dir="rtl">
    <div class="col-lg-4">
      <x-project-card :project="$project" full />

      <div class="card mt-4">
        <div class="card-body">

          <div class="card-title">تغيير حالة المشروع</div>

          <div>
            <form action="/projects/{{ $project->id }}" method="POST">
              @csrf
              @method('PATCH')
              <select class="custom-select" name="status" onchange="this.form.submit()">
                <option {{ $project->status == 0 ? 'selected' : '' }} value="0">قيد الانجاز</option>
                <option {{ $project->status == 1 ? 'selected' : '' }} value="1">منتهي</option>
                <option {{ $project->status == 2 ? 'selected' : '' }} value="2">ملغي</option>
              </select>
            </form>
          </div>

        </div>
      </div>

    </div>

    <div class="col-lg-8">

      @foreach ($project->tasks as $task)
      <div class="card mb-4">
        
        <div class="d-flex p-3 align-items-center justify-content-between" dir="rtl">
          <p class="m-0" {{ $task->completed ? 'style=text-decoration:line-through;' : '' }} >{{ $task->body }}</p>

          <div class="d-flex align-items-center pe-2">
            <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="post" >
              @csrf
              @method('PATCH')
              <div class="form-check">
                <input
                class="form-check-input"
                type="checkbox"
                {{ $task->completed ? 'checked' : '' }}
                name="completed"
                onchange="this.form.submit()"
                >
              </div>
            </form>
            
            <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="post" class="me-3" id="delete-task-{{ $task->id }}">
              @csrf
              @method('DELETE')
              
              <div>
                <i class="bi bi-trash" style="cursor: pointer;" onclick="document.querySelector('#delete-task-{{ $task->id }}').submit()"></i>
              </div>
            </form>
            
          </div>
        </div>
   
      </div>
      @endforeach

      <div class="card">
        <form action="/projects/{{ $project->id }}/tasks" method="post">
          @csrf
          <div class="d-flex p-3" dir="rtl">
            <input style="background-color: transparent;" type="text" name="body" class="form-control p-2" placeholder="أضف مهمة جديدة">
            <span style="width: 20px"></span>
            <input type="submit" class="btn btn-primary ml-4" value="إضافة مشروع">
          </div>
        </form>
      </div>


    </div>

  </section>
@endsection