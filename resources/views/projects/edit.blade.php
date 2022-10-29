@props(['project'])

@extends('layouts.app')

@section('title', 'Edti Project')

@section('content')
  <div class="row justify-content-center text-right">

    <div class="col-10">
      <h3 class="text-center pb-5 font-weight-bold">تعديل المشروع</h3>
    </div>


    <form action="/projects/{{ $project->id }}" method="POST" dir="rtl">
      @csrf
      @method('PUT')

      @include('projects.form', $project)

      <div class="form-group">
        <button type="submit" class="btn btn-primary">تعديل</button>
        <a href="/projects/{{ $project->id }}" class="btn btn-light">إلغاء</a>
      </div>

    </form>


  </div>
@endsection