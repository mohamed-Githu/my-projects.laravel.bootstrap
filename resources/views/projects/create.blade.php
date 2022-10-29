@props(['project'])

@extends('layouts.app')

@section('title', 'New Project')

@section('content')
  <div class="row justify-content-center text-right">

    <div class="col-10">
      <h3 class="text-center pb-5 font-weight-bold">مشروع جديد</h3>
    </div>

    <form action="/projects" method="POST" dir="rtl">

      @include('projects.form')

      <div class="form-group">
        <button type="submit" class="btn btn-primary">إنشاء</button>
        <a href="/projects" class="btn btn-light">إلغاء</a>
      </div>

    </form>


  </div>
@endsection