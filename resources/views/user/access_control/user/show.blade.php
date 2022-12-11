@extends('user.layouts.app')
@section('title', 'User')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'personal'=>route('dashboard'),
    'User'=>route('user.users.index'),
    'User Show'=>''
    ]
    @endphp
    <x-bread-crumb-component title='User' :links="$links" />
    <div class="content-body">
        <!-- Aligned Pills Start -->
        <section id="aligned-pills">
            <div class="row match-height">
                <!-- Center Pills Start -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Information</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <ul class="nav nav-pills justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" id="personal-tab-center" data-toggle="pill" href="#personal-center" aria-expanded="true">Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bank-tab-center" data-toggle="pill" href="#bank-center" aria-expanded="false">Bank</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="academic-tab-center" data-toggle="pill" href="#academic-center" aria-expanded="false">Academic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="professional-tab-center" data-toggle="pill" href="#professional-center" aria-expanded="false">Professional</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="leave-tab-center" data-toggle="pill" href="#leave-center" aria-expanded="false">Leave</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="personal-center" aria-labelledby="personal-tab-center" aria-expanded="true">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Name: </strong>{{$user->name}}</td>
                                                        <td><strong>Email: </strong>{{$user->email}}</td>
                                                        <td><strong>Phone: </strong>{{$user->phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-center">Content</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="leave-center" role="tabpanel" aria-labelledby="leave-tab-center" aria-expanded="false">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Leave Allocation</h4>
                                        </div>
                                        <div class="card-body">
                                            @if(!empty($user->Leave_policy->items))
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Leave Type</th>
                                                        <th>Allocate Leave</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($user->Leave_policy->items as $key=>$item)
                                                    <tr>
                                                        <td>{{++$key }}</td>
                                                        <td>{{$item->leave_type->name }}</td>
                                                        <td>{{$item->allocate_leave}}</td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                    <tr>
                                                        <th colspan="2">Total Allocated Leave</th>
                                                        <th>{{ $user->Leave_policy->total_leave }}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @else
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-danger">No Allocated Leave Policy</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="academic-center" role="tabpanel" aria-labelledby="academic-tab-center" aria-expanded="false">
                                    <h3>Academic</h3>
                                </div>
                                <div class="tab-pane" id="bank-center" role="tabpanel" aria-labelledby="bank-tab-center" aria-expanded="false">
                                    <h3>bank</h3>
                                </div>
                                <div class="tab-pane" id="bank-center" role="tabpanel" aria-labelledby="bank-tab-center" aria-expanded="false">
                                    <p>
                                        Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                                        cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder
                                        tootsie roll cake.Chocolate bonbon chocolate chocolate cake halvah tootsie roll marshmallow. Brownie
                                        chocolate toffee toffee jelly beans bonbon sesame snaps sugar plum candy canes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Centered Pills End -->
            </div>
        </section>
        <!-- Aligned Pills End -->
    </div>
</div>

@endsection
@section('css')

@endsection
@section('js')

@endsection
@push('script')

@endpush