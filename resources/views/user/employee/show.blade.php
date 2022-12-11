@extends('user.layouts.app')
@section('title', 'User')
@section('content')
    <div class="content-wrapper">
        @php
            $links = [
                'Dashboard' => route('dashboard'),
                'Employee' => route('user.employees.index'),
                'Employee Show' => '',
            ];
        @endphp
        <x-bread-crumb-component title='Employee' :links="$links" />
        <div class="content-body">
            <!-- Aligned Pills Start -->
            <section id="aligned-pills">
                <div class="row match-height">
                    <!-- Center Pills Start -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Employee Details</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h4>Personal</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Name: </strong>{{ $employee->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email: </strong>{{ $employee->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone: </strong>{{ $employee->user->phone }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h4>Professional</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Name: </strong></td>
                                            <td><strong>Name: </strong></td>
                                            <td><strong>Name: </strong></td>

                                        </tr>
                                        @forelse ($employee->professions as $row)
                                            <tr>
                                                <td><strong>{{ $row }}</strong></td>
                                                <td><strong>{{ $row }}</strong></td>
                                                <td><strong>{{ $row }}</strong></td>

                                            </tr>
                                        @empty
                                        @endforelse


                                    </tbody>
                                </table>
                                <br>
                                <h4>Professional</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Name: </strong></td>
                                            <td><strong>Name: </strong></td>
                                            <td><strong>Name: </strong></td>
                                        </tr>
                                        @forelse ($employee->professions as $row)
                                            <tr>
                                                <td><strong>{{ $row }}</strong></td>
                                                <td><strong>{{ $row }}</strong></td>
                                                <td><strong>{{ $row }}</strong></td>

                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <br>
                                <h4>Bank</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Account Title: </strong></td>
                                            <td><strong>Name: </strong></td>
                                            <td><strong>Name: </strong></td>
                                        </tr>
                                        @forelse ($employee->banks as $row)
                                            <tr>
                                                <td><strong>{{ $row->account_title }}</strong></td>
                                                <td><strong>{{ $row }}</strong></td>
                                                <td><strong>{{ $row }}</strong></td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
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
