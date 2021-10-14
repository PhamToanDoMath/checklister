@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>{{__('Register Time')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Website')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->website}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

