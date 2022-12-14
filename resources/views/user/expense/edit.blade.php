@extends('user.layouts.app')

@section('title', 'user Edit')
@section('content')
<div class="content-wrapper">
    @php
        $links = [
            'Home'=>route('user.dashboard'),
            'user list'=>route('user.users.index'),
            'user Edit'=>'',
        ]
    @endphp
    <x-bread-crumb-component title='user list' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">user Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.users.update',$user->id)}}" method="POST" class="" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" placeholder="Enter Name">
                                            @if($errors->has('name'))
                                                <small class="text-danger">{{$errors->first('name')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" placeholder="Enter Email">

                                            @if($errors->has('email'))
                                                <small class="text-danger">{{$errors->first('email')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" value="{{$user->mobile}}">
                                            @if($errors->has('mobile'))
                                                <small class="text-danger">{{$errors->first('mobile')}}</small>
                                            @endif
                                        </div>
                                    </div>

                                    @can('user-edit')
                                    <div class="col-md-6 mb-1">
                                        <label>Role</label>
                                        {!! Form::select('roles[]', $roles,$selected_roles ?? '', array('class' => 'select2 form-control','multiple'=>'multiple')) !!}
                                    </div>
                                    @endcan

                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
                                            @if($errors->has('password'))
                                                <small class="text-danger">{{$errors->first('password')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation">
                                            @if($errors->has('password_confirmation'))
                                                <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="active">Active</label>
                                            <select name="is_active" class="form-control select2">
                                                <option value=" ">Select User Status</option>
                                                <option value="1" {{ $user->is_active==1?'selected':''}}>Active</option>
                                                <option value="0" {{ $user->is_active==0?'selected':''}}>Inactive</option>
                                            </select>
                                            @if($errors->has('is_active'))
                                                <small class="text-danger">{{$errors->first('is_active')}}</small>
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
