@extends('layouts.master')
@section('content')
  <div class="section">
    <div class="container">
        <div class="panel panel-default widget">
            <div class="panel-heading"style="height: 60%;">
                <h3 class="text-center">All orders</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @include('partials.order', $orders)

                </ul>
            </div>
        </div>

    </div>
  </div>


@endsection