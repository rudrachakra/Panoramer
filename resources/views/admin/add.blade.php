@extends('main')

@section('title')
  Создание панорамы
@endsection

@section('content')
  <h4>Создание панорамы</h4>
  <form method="POST" enctype="multipart/form-data" action="/admin/add">
    {{ csrf_field() }}
    <div class="form-group" style="display: block;">
      <label><b>Заголовок</b></label>
      <input type="text" class="form-control" name="pano[title]" required="" />
    </div>  
    <div class="form-group" style="display: block;">
      <label><b>Короткое название на латинице</b></label>
      <input type="text" class="form-control" name="pano[name]" required="" />
    </div> 
    <hr />
    <h5>Виды</h5>
    <div id="views">
      <div id="view_0">
        <span class="badge badge-success">Вид 1</span>
        <div class="form-group" style="display: block;">
          <label><b>Описание</b></label>
          <input type="text" class="form-control" name="view[0][description]" required="" />
        </div> 
        <div class="form-group" style="display: block;">
          <label><b>Файл</b></label>
          <label class="custom-file col-md-12" id="customFile">
            <input type="file" name="view[0][jpg]" class="form-control custom-file-input">
            <span class="custom-file-control form-control-file"></span>
          </label>
        </div>
        <hr />
      </div>
    </div>
    <div class="form-group">
      <button type="button" id="addView" class="btn btn-outline-success">Добавить вид</button>
      <button type="button" id="removeView" class="btn btn-outline-danger">Удалить вид</button>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Создать панораму">      
    </div>
  </form>
@endsection

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/admin/addView.js')}}"></script>
@endpush