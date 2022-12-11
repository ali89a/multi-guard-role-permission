@extends('user.layouts.app')

@section('title', 'User Edit')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard'),
    'User List'=>route('user.users.index'),
    'User Edit'=>'',
    ]
    @endphp
    <x-bread-crumb-component title='User List' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.users.update',$user->id)}}" method="POST" class="" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" placeholder="Enter Name">
                                            @if($errors->has('name'))
                                            <small class="text-danger">{{$errors->first('name')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" placeholder="Enter Email">

                                            @if($errors->has('email'))
                                            <small class="text-danger">{{$errors->first('email')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                  
                                    {{-- @can('user-edit') --}}
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <label>Role</label>
                                        {!! Form::select('roles[]', $roles,$selected_roles ?? '', array('class' => 'select2 form-control','multiple'=>'multiple')) !!}
                                    </div>
                                    {{-- @endcan --}}

                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
                                            @if($errors->has('password'))
                                            <small class="text-danger">{{$errors->first('password')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation">
                                            @if($errors->has('password_confirmation'))
                                            <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="active">Active</label>
                                            <select name="is_active" class="form-control select2">
                                                <option value=" ">Select User Status</option>
                                                <option value="active" {{ $user->is_active=="active"?'selected':''}}>Active</option>
                                                <option value="inactive" {{ $user->is_active=="inactive"?'selected':''}}>Inactive</option>
                                                <option value="unused" {{ $user->is_active=="unused"?'selected':''}}>Unused</option>
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
