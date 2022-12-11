@extends('user.layouts.app')
@section('title', 'Brand Create')
@section('content')
<div class="content-wrapper">
    @php
        $links = [
            'Home'=>route('dashboard'),
            'Brand'=>route('user.brands.index'),
            'Brand create'=>''
        ]
    @endphp
    <x-bread-crumb-component title='Brand' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Brand Create</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.brands.store')}}" method="POST" class="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}">
                                             @if($errors->has('name'))
                                                <small class="text-danger">{{$errors->first('name')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label>Parent</label>
                                        <select class="select2 form-control" name="parent_id">
                                            <option value="">Select One</option>
                                            @forelse($brands as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @empty
                                            @endforelse

                                        </select>
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
