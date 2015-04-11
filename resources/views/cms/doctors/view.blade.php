@extends('cms.default')

@section('content')

<div ng-controller="CmsDoctorViewCtrl">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-sm-12">
            <strong>Doctors Detail</strong>
            <a href="/cms/doctors/{{$doctor->id}}/edit" class="btn btn-info pull-right">edit</a>
          </div>
        </div>           
      </div>
      <!-- success msg -->
      <div class="panel-body">

        <div class="text-center">
          <h3>{{ $doctor->doctor_name }}</h3>
          <hr>
        </div>
        
        <div class="text-muted col-sm-8 col-sm-offset-2 text-justify">
        <input type="hidden" value="{{$doctor->speciid}}" id="speciid" />

          <strong>Specialty:</strong> <% specialtyname %>
          <hr>
          <strong>Introduction:</strong> {{ $doctor->intro }}
          <hr>
          <strong>Address: </strong> {{ $doctor->address }}
          <hr>
          <strong>latitude: </strong> {{ $doctor->latitude }} | <strong>longitude:</strong> {{ $doctor->longitude }} 
          <hr>
          <strong>Overview:</strong> {{ $doctor->overview }}
          <hr>
          <strong>Patient ratings:</strong> {{ $doctor->patient_ratings }}
          <hr>
          <strong>Background:</strong> {{ $doctor->background }}
          <hr>
          <strong>Appointments: </strong>{{ $doctor->appointments }}
          <hr>
          <strong>Pic url:</strong> {{ $doctor->pic_url }}
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