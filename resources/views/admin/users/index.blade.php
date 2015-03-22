@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Users list</div>

                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th>email</th>
                            <th>nick name</th>
                            {{--<th>first name</th>--}}
                            {{--<th>last name</th>--}}
                            {{--<th>gender</th>--}}
                            {{--<th>phone</th>--}}
                            {{--<th>address</th>--}}
                            {{--<th>zip code</th>--}}
                            {{--<th>birth</th>--}}
                            <th>role</th>
                            <th>status</th>

                            @if( Auth::user()->rid == 2 || Auth::user()->rid == 3 )
                            <th>modify</th>
                            @endif
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{ URL('http://healthmate.app/user/'.$user->id.'/edit') }}">
                                {{$user->name}}
                                </a>
                            </td></td>
                            {{--<td>{{$user->first_name}}</td>--}}
                            {{--<td>{{$user->last_name}}</td>--}}
                            {{--<td>{{$user->gender}}</td>--}}
                            {{--<td>{{$user->phone}}</td>--}}
                            {{--<td>{{$user->address}}</td>--}}
                            {{--<td>{{$user->zip_code}}</td>--}}
                            {{--<td>{{$user->birth}}</td>--}}
                            <td>

                                @if($user->rid==1)
                                    user
                                @elseif($user->rid==2)
                                    admin
                                @elseif($user->rid==3)
                                    God
                                @else
                                    editor
                                @endif
                            <td>
                                @if($user->status==0)
                                    active
                                @else
                                    blocked
                                @endif
                            </td>

                            @if( Auth::user()->rid == 2 || Auth::user()->rid == 3 )
                            <td>
                                <form action="{{ URL('admin/users/'.$user->id) }}" method="POST" style="display: inline;">
                                    <input name="_method" type="hidden" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $user->id }}">

                                    @if( $user->rid != 3 && Auth::user()->id != $user->id )
                                        @if($user->status == 0 )
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="btn btn-danger">BLOCK</button>
                                        @else
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="btn btn-info">UNBLOCK</button>
                                        @endif
                                    @endif
                                </form>
                            <td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection