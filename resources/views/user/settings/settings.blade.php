@extends('user.layouts.app')

@section('title', 'Settings')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard'),
    'Settings'=>'',
    ]
    @endphp
    <x-bread-crumb-component title='Settings' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Settings</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.companies.update',$company->id)}}" method="POST" class="" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$company->name}}" name="name" placeholder="Enter Company Name">
                                            @if($errors->has('name'))
                                            <small class="text-danger">{{$errors->first('name')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                 
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="plan">Plan</label>
                                            <input type="text" class="form-control" id="plan" value="{{$company->plan->name}}" name="plan" placeholder="Enter Plan" readonly>
                                            @if($errors->has('plan'))
                                            <small class="text-danger">{{$errors->first('plan')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="start_time">Office Start Time</label>
                                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{$company->start_time}}" placeholder="Enter Start Time">
                                            @if($errors->has('start_time'))
                                            <small class="text-danger">{{$errors->first('start_time')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="end_time">Office End Time</label>
                                            <input type="time" class="form-control" id="end_time" name="end_time"  value="{{$company->end_time}}" placeholder="Enter End Time">
                                            @if($errors->has('end_time'))
                                            <small class="text-danger">{{$errors->first('end_time')}}</small>
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