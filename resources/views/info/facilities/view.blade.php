@extends('app')

@section('content')

<div>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-sm-12">
            <strong>Facility Detail</strong>
          </div>
        </div>           
      </div>
      <!-- success msg -->
      <div class="panel-body">

        <div class="text-center">
          <h3>{{ $facility->facility_name }}</h3>
          <hr>
        </div>
        
        <div class="text-muted col-sm-8 col-sm-offset-2 text-justify">
          <strong>Introduction:</strong> {{ $facility->intro }}
          <hr>
          <strong>address: </strong> {{ $facility->address }}
          <hr>
          <strong>web:</strong> {{ $facility->web_url }}
          <hr>
          <strong>telephone:</strong> {{ $facility->tel }}
          <hr>
          <strong>latitude: </strong> {{ $facility->latitude }} | <strong>longitude:</strong> {{ $facility->longitude }} 
          <hr>
          <strong>overview:</strong> {{ $facility->overview }}
          <hr>
          <strong>pic: </strong>{{ $facility->pic_url }}
          <hr>
          <strong>facebook:</strong> {{ $facility->facebook_url }}
          <hr>
          <strong>youtube:</strong> {{ $facility->youtube_url }}
          <hr>
          <strong>twitter:</strong> {{ $facility->twitter_url }}
          <hr>
          <strong>google:</strong> {{ $facility->google_url }}
          <br><br><br>

        </div>


        <div class="text-muted col-sm-12">
          <h5><hr></h5>
        </div>

      </div>
    </div>

  </div>
</div>
@endsection