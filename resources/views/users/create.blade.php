@extends('layouts.default')
@section('title', '注册')

@section('content')
  <div class="offset-md-2 col-md-8">
    <div class="card">
      <div class="card-header">
       <h1>注册</h1>
      </div>
      <div class="card-body">

        @include('shared._error')

        <form method="post" action="{{ route('users.store') }}">
          <div class="form-group">
            <label for="name">名称：</label>
            <input type="text"  name="name" class="form-control" id="name" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
          </div>
          <div class="form-group">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
          </div>
          <button type="submit" class="btn btn-primary">注册</button>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
@stop
