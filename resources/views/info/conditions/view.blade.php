@extends('app')

@section('content')

<div>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-sm-12">
            <strong>Condition Detail</strong>
          </div>
        </div>           
      </div>
      <!-- success msg -->
      <div class="panel-body">

        <div class="text-center">
          <h3>{{ $condition->title }}</h3>
          <hr>
        </div>
        
        <div class="text-muted col-sm-8 col-sm-offset-2 text-justify">
          <strong>Is common:</strong> @if( $condition->is_common ==1) Yes @elseif( $condition->is_common ==0) No @endif
          <hr>
          <strong>Content: </strong> <br>{{ $condition->content }}
          <hr>
          <strong>web:</strong> {{ $condition->fromurl }}
          <hr>
          <strong>description:</strong>  <br>{{ $condition->description }}
          <hr>
          <strong>symptoms: </strong>  <br>{{ $condition->symptoms }}
          <hr>
          <strong>tests:</strong>  <br>{{ $condition->tests }}
          <hr>
          <strong>treatment: </strong> <br>{{ $condition->treatment }}
          <hr>
          <strong>image url:</strong> {{ $condition->img_url }}
          <hr>
          <strong>video rl:</strong> {{ $condition->video_url }}
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