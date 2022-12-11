@extends('user.layouts.app')

@section('title', 'Address')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard'),
    'Address'=>'',
    ]
    @endphp
    <x-bread-crumb-component title='Address' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Address</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.company.address.update',$company->id)}}" method="POST" class="" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" value="{{$company->address}}" name="address" placeholder="Enter Address">
                                            @if($errors->has('address'))
                                            <small class="text-danger">{{$errors->first('address')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" value="{{$company->latitude}}" name="latitude" placeholder="Enter latitude">
                                            @if($errors->has('latitude'))
                                            <small class="text-danger">{{$errors->first('latitude')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" value="{{$company->longitude}}" name="longitude" placeholder="Enter longitude">
                                            @if($errors->has('longitude'))
                                            <small class="text-danger">{{$errors->first('longitude')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="radius">Radius</label>
                                            <input type="text" class="form-control" id="radius" value="{{$company->radius}}" name="radius" placeholder="Enter radius">
                                            @if($errors->has('radius'))
                                            <small class="text-danger">{{$errors->first('radius')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Inputs end -->
    </div>
</div>

@endsection
@section('css')

@endsection
@section('js')

@endsection
@push('script')

@endpush