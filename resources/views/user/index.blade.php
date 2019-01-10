@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading"style="height: 60%;">
                <h3 class="text-center">All users</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach ($users as $user)
                        @if ($user->type == 'admin') @continue @endif
                        <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-2 col-md-1">
                                        <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                    <div class="col-xs-10 col-md-11">
                                        <div>
                                        <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">{{ $user->name }} {{ $user->surname }}</a>
                                        </div>
                                        <div class="comment-text">
                                            {{ $user->email }}
                                        </div>
                                        <div class="action">
                                            <a href={{ route('user.profile', ['id' => $user->id])}} role="button" class="btn btn-primary btn-xs" title="See profile">
                                                <span class="fa fa-arrow-right"></span>
                                            </a>
                                            {{-- <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button> --}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
