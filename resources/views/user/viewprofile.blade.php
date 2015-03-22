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
                    <a href="{{ '/user/'. Auth::id() . '/edit' }}" class="btn btn-lg btn-primary btn-block">edit</a>
            </div>
        </div>
    </div>
@endsection