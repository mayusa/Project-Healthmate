@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">

        <div class="panel-heading">My profile</div>

        <table class="table">

          <tr>
            <td class="text-right text-info">
              Email
            </td>
            <td>
              {{$user->email}}
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Nick Name
            </td>
            <td>
              {{$user->name}}
            </td>
          </tr>
          @if(Auth::user()->rid == 2 || Auth::user()->rid == 3)

          <tr>
            <td class="text-right text-info">
              Role
            </td>
            <td>
              @if($user->rid == 1)
              User
              @elseif($user->rid == 2)
              Admin
              @elseif($user->rid == 3)
              God
              @else
              Editor
              @endif
            </td>
          </tr>
          @endif
          <tr>
            <td class="text-right text-info">
              First Name
            </td>
            <td>
              {{$user->first_name}}
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Last Name
            </td>
            <td>
              {{$user->last_name}}
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Gender
            </td>
            <td>
              @if($user->gender ==1  )
              male
              @else
              female
              @endif
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Phone
            </td>
            <td>
              {{$user->phone}}
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Address
            </td>
            <td>
              {{$user->address}}
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Zip Code
            </td>
            <td>
              {{$user->zip_code}}
            </td>
          </tr>
          <tr>
            <td class="text-right text-info">
              Birth Day
            </td>
            <td>
              {{$user->birth}}
            </td>
          </tr>

          <tr>
            <td class="text-right text-info">
              Created at
            </td>
            <td>
              {{$user->created_at}}
            </td>
          </tr>
        </table>

      </div>

      @if( (Auth::user()->rid == 2 && $user->rid != 2 && $user->rid != 3 ) || Auth::user()->rid == 3 || Auth::id() == $user->id )
      <a href="{{ '/user/'. $user->id . '/edit' }}" class="btn btn-lg btn-primary btn-block">edit</a>
      @endif
    </div>
  </div>
</div>
<br><br>
@endsection