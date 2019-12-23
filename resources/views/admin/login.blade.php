@extends('main')

@section('title')
    Вход в админку
@endsection

@section('content')
  @if (isset($error))
    <p>Пароль или логин не подошли!</p>
  @endif

  <form method="POST" action="/admin/checker">
    {{ csrf_field() }}
    <div class="form-group" style="display: block;">
      <label><b>Логин</b></label>
      <input type="text" class="form-control" name="user[login]" required="" />
    </div>  
    <div class="form-group" style="display: block;">
      <label><b>Пароль</b></label>
      <input type="password" class="form-control" name="user[pass]" required="" />
    </div> 
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Войти">      
    </div>
  </form>
@endsection