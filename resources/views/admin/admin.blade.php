@extends('main')

@section('title')
  Админка
@endsection

@section('content')
  <p class="text-center">
    <a class="btn btn-success btn-sm" href='/admin/add'>
      Добавить панораму
    </a>
  </p>
  <p><h5>Список панорам</h5></p>
  <ul>
    @foreach ($panos as $pano)
      <li>
        <p>
          {{ $pano->title }}
        </p>
        <p>
          <a class="btn btn-warning btn-sm" href='/admin/edit/{{$pano->id}}'>
            Редактировать
          </a> 
        </p>
      </li>
    @endforeach
  </ul>
@endsection