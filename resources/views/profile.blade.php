@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="row my-5">
  <div class="col-lg-6 mx-auto">
    <div class="card p-4">

      <form action="/profile" method="post" dir="rtl" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
          
        <div class="d-flex align-items-center flex-column mb-3">
          <img width="82" height="82" src="{{ asset('storage/' . $user->avatar) }}" alt="avatar">
          <h4 class="mt-3">{{ $user->name }}</h4>
        </div>
      
        <div class="row gy-3 card-body">

          <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
          </div>
        
          <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
          </div>
        
          <div class="form-group">
            <label for="avatar">الصورة الشخصية</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
          </div>
        
          <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
        
          <div class="form-group">
            <label for="password_confirmation">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
          </div>

        </div>

        <div class="form-group d-flex mt-5 flex-row-reverse">
          <button type="submit" class="btn-primary btn me-4">حفظ التعديلات</button>
          <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
        </div>
      
      </form>

      <form action="/logout" id="logout" method="post">
        @csrf
      </form>

    </div>
  </div>
</div>

@endsection