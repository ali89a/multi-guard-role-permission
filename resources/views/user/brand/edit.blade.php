@extends('user.layouts.app')

@section('title', 'Department')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard'),
    'Departments'=>route('user.departments.index'),
    'Department Edit'=>'',
    ]
    @endphp
    <x-bread-crumb-component title='Department' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Department Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.departments.update',$department->id)}}" method="POST" class="" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$department->name}}" name="name" placeholder="Enter Name">
                                            @if($errors->has('name'))
                                            <small class="text-danger">{{$errors->first('name')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control select2">
                                                <option value=" ">Select One</option>
                                                <option value="active" {{ $department->status=='active'?'selected':''}}>Active</option>
                                                <option value="inactive" {{ $department->status=='inactive'?'selected':''}}>Inactive</option>
                                            </select>
                                            @if($errors->has('status'))
                                            <small class="text-danger">{{$errors->first('status')}}</small>
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