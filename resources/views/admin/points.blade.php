@extends('main')

@push('head')
  <link rel="stylesheet" href="http://api.liart.ru/bootstrap/css/pannellum.css"/>
  <script type="text/javascript" src="http://api.liart.ru/bootstrap/js/pannellum.js"></script>



@section('title')
  Добавление точек
@endsection

@section('content')

<div id="panorama"></div>

{{asset('storage/file.txt')}}

@endsection

@push('scripts')
 
  <script type="text/javascript">
  
    const getId = () => {
      let path_names = window.location.pathname.split('/');
      return path_names[path_names.length - 1];
    }

    const getAjax = (url)=> {
      return new Promise(function(succeed, fail) {
        var request = new XMLHttpRequest();
        request.open("GET", url, true);
        request.addEventListener("load", function() {
          if (request.status < 400)
            succeed(request.response);
          else
            fail(new Error("Request failed: " + request.statusText));
        });
        request.addEventListener("error", function() {
          fail(new Error("Network error"));
        });
        request.send();
      });
    }

    let request = getAjax(window.location.origin + "/api/view/" + getId());

    request.then(result => {

      pannellum.viewer('panorama', {   
        "default": {
          "firstScene": "pano1",
        },
        "scenes":  {
            "pano1": {
            "title": "Панорама 1",
            'vaov': 80,
            'maxPitch':40,
            'minPitch':-40,
            'maxHfov':0,
            'showFullscreenCtrl':false,
            "type": "equirectangular",
            "panorama": 'http://192.168.1.33:9010/img/kruger.jpg',
            'backgroundColor':['233', '228', '228'],
            'hotSpotDebug':true,
            //"hotSpots": getPointsPano1()
          }
        }
      });
    });  


  </script>
@endpush