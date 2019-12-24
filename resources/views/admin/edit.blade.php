@extends('main')

@section('title')
  Редактирование панорамы
@endsection

@section('content')
  <h4>Редактирование панорамы</h4>
  <form method="POST" action="/admin/edit/{{$pano->id}}">
    {{ csrf_field() }}
    <p><b>ID</b> {{$pano->id}}</p>
    <input type="hidden" name="pano[id]" value="{{$pano->id}}" />
    <div class="form-group" style="display: block;">
      <label><b>Короткое название на латинице</b></label>
      <input type="text" class="form-control" name="pano[name]" value="{{$pano->name}}" disabled required="" />
      <small>Менять не рекомендуется</small>
    </div> 
    <div class="form-group" style="display: block;">
      <label><b>Заголовок</b></label>
      <input type="text" class="form-control" name="pano[title]" value="{{$pano->title}}" required="" />
    </div>  
    <h5>Виды</h5>

    @for ($i = 0; $i < count($views); $i++)
	    <div class="form-group" style="display: block;">
        <label><b>Описание {{$i + 1}}</b></label>
        <input type="text" class="form-control" name="view[{{$i}}][description]" value="{{$views[$i]->description}}" required="" />
      </div> 
      <div class="form-group" style="display: block;">
        <label><b>Ссылка {{$i + 1}}</b></label>
        <input type="text" class="form-control" name="view[{{$i}}][url]" value="{{$views[$i]->url}}" required="" />
      </div> 
      <input type="hidden" class="form-control" name="view[{{$i}}][id]" value="{{$views[$i]->id}}" required="" />
      <a class="btn btn-info btn-sm" href='/admin/points/edit/{{$views[$i]->id}}'>
        Настроить точки
      </a>
      <hr />
    @endfor

    <input type="submit" class="btn btn-success btn-sm" href='/admin/save/{{$pano->id}}' value="Сохранить" />
    <a class="btn btn-danger btn-sm" href='/admin/delete/{{$pano->id}}'>
      Удалить
    </a>
  </form>
@endsection

