@extends('user.layouts.app')

@section('title', 'Expenses')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin')}}/app-assets/css/core/menu/menu-types/vertical-menu.css">
@endpush
@section('content')

<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard'),
    'Expenses list'=>''
    ]
    @endphp
    <x-bread-crumb-component title='Expenses' :links="$links" />
    <div class="content-body">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                {{-- show from datatable--}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Responsive tables end -->
    </div>
</div>
@endsection
@push('script')


<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
            stateSave: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('user.expenses.index') }}",
            },
            columns: [{
                    data: "DT_RowIndex",
                    title: "SL",
                    name: "DT_RowIndex",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "user",
                    title: "user",
                    searchable: true
                },
                {
                    data: "daily_allowance",
                    title: "daily allowance",
                    searchable: true
                },
                {
                    data: "hotel_rent",
                    title: "hotel rent",
                    searchable: true
                },
                {
                    data: "food",
                    title: "food",
                    searchable: true
                },
                {
                    data: "photostat",
                    title: "photostat",
                    searchable: true
                },
                {
                    data: "courrier",
                    title: "courrier",
                    searchable: true
                },
                {
                    data: "mobile",
                    title: "mobile",
                    searchable: true
                },
                {
                    data: "service",
                    title: "service",
                    searchable: true
                },
                {
                    data: "others",
                    title: "others",
                    searchable: true
                },
                {
                    data: "attachment",
                    title: "Attachment",
                    searchable: true
                },
                {
                    data: "created_date",
                    title: "Created At",
                    searchable: true
                },
            ],
        });
    })
</script>

@endpush