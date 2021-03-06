@extends('layouts.master')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="http://bootdey.com/img/Content/avatar/avatar7.png" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                <div class="middle">
                                    <input type="file" style="display: none;" id="profilePicture" name="file" />
                                </div>
                            </div>
                            <div class="userData ml-3">
                            <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{ $user->name }} {{ $user->surname }}</a></h2>
                                <h6 class="d-block">{{ $user->email }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Orders</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

                                    @foreach ( $addresses as $address)



                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Address {{ $loop->iteration }}:</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                    {{ $address->street }}
                                    {{ $address->zip_code }}
                                    {{ $address->city }}
                                <hr>
                                        </div>
                                    </div>
                                    <hr />
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    @include('partials.order', $orders)
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>

@endsection