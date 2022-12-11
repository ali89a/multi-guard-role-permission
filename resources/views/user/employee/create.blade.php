@extends('user.layouts.app')
@section('title', 'Employee Create')
@section('content')
    <div class="content-wrapper">
        @php
            $links = [
                'Home' => route('dashboard'),
                'Employee list' => route('user.employees.index'),
                'Employee create' => '',
            ];
        @endphp
        <x-bread-crumb-component title='Employee Create' :links="$links" />
        <div class="content-body">
            <!-- Basic Inputs start -->
            <section id="basic-input">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.employees.store') }}" method="POST" class=""
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Employee Create</h4>
                                </div>
                                <hr style="margin: 0;">
                                <div class="card-body">
                                    <h4><span style="border-bottom:3px solid #ebe9f1;padding:5px;">Login Information</span>
                                    </h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Enter Email" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="Enter Phone" value="{{ old('phone') }}">
                                                @if ($errors->has('phone'))
                                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <label>Role</label>
                                            <select class="select2 form-control" name="roles[]" multiple=""
                                                data-placeholder="Yours Placeholder">
                                                @forelse($roles as $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span style="border-bottom:3px solid #ebe9f1;padding:5px;">Personal</span> </h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Name" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Department</label>
                                            <select class="select2 form-control" name="department_id">
                                                <option value=" ">Select One</option>
                                                @forelse($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Designation</label>
                                            <select class="select2 form-control" name="designation_id">
                                                <option value=" ">Select One</option>
                                                @forelse($designations as $designation)
                                                    <option value="{{ $designation->id }}">{{ $designation->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob"
                                                    placeholder="Enter Date Of Birth" value="{{ old('dob') }}">
                                                @if ($errors->has('dob'))
                                                    <small class="text-danger">{{ $errors->first('dob') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="doj">Date Of Joinning</label>
                                                <input type="date" class="form-control" id="doj" name="doj"
                                                    placeholder="Enter Date Of Birth" value="{{ old('doj') }}">
                                                @if ($errors->has('doj'))
                                                    <small class="text-danger">{{ $errors->first('doj') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="nid">National ID Number</label>
                                                <input type="text" class="form-control" id="nid" name="nid"
                                                    value="{{ old('nid') }}" placeholder="National ID Number">
                                                @if ($errors->has('nid'))
                                                    <small class="text-danger">{{ $errors->first('nid') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Blood Group</label>
                                            <select class="select2 form-control" name="blood_group">
                                                <option value="">Select One</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="select2 form-control" name="gender">
                                                    <option value="">Select One</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="type">Employee Type</label>
                                                <select class="select2 form-control" name="type">
                                                    <option value="">Select One</option>
                                                    <option value="full_time">Full Time</option>
                                                    <option value="part_time">Part Time</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vue_app">
                                        <br>
                                        <h4><span style="border-bottom:3px solid #ebe9f1;padding:5px;">Professional</span>
                                        </h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="job_title">Job Title</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="job_title" placeholder="Job Title">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="company_name">Company Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="company_name" placeholder="Enter Company Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="from_date">From Date</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        v-model="from_date" placeholder="">

                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="to_date">To Date</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        v-model="to_date" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="responsibility">Responsibility</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="responsibility" placeholder="Enter responsibility">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-2 col-12">
                                                <div class="form-group">
                                                    <button type="button" @click="select_professions()"
                                                        class="btn btn-sm btn-outline-primary btn-block mt-2"><i
                                                            class="fa fa-plus-circle"></i> Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Job Title</th>
                                                            <th>Company Name</th>
                                                            <th>From Date</th>
                                                            <th>To Date</th>
                                                            <th>Duration</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr v-for="(row, index) in profession_items">

                                                            <td>
                                                                <input type="text"
                                                                    :name="'professions[' + index + '][position_name]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.job_title">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'professions[' + index + '][company_name]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.company_name">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'professions[' + index + '][from_date]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.from_date">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'professions[' + index + '][to_date]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.to_date">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'professions[' + index + '][responsibility]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.responsibility">
                                                            </td>
                                                            <td style="padding: 0px">
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    @click="delete_profession_row(row)"><i
                                                                        class="fa fa-times"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <h4><span style="border-bottom:3px solid #ebe9f1;padding:5px;">Academic</span></h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="education_level">Curriculum</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="education_level" placeholder="Bangla Medium">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="degree_title">Exam/Degree Title</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="degree_title" placeholder="Enter Exam/Degree Title">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="board">Board</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="board" placeholder="Enter Board">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="institute_name">Institute Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="institute_name" placeholder="Enter Institute Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="group">Group/Mejor</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="group" placeholder="Science">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-2 col-12">
                                                <div class="form-group">
                                                    <label for="result">Result</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="result" placeholder="Enter Result">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-2 col-12">
                                                <div class="form-group">
                                                    <label for="passing_year">Passing Year</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="passing_year" placeholder="Enter Passing Year">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-2 col-12">
                                                <div class="form-group">
                                                    <button type="button" @click="select_item()"
                                                        class="btn btn-sm btn-outline-primary btn-block mb-2"><i
                                                            class="fa fa-plus-circle"></i> Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Curriculum</th>
                                                            <th>Degree Title</th>
                                                            <th>Board</th>
                                                            <th>Institute Name</th>
                                                            <th>Group/ Mejor</th>
                                                            <th>Result</th>
                                                            <th>Passing Year</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr v-for="(row, index) in items">
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][education_level]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.education_level">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][degree_title]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.degree_title">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][board]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.board">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][institute_name]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.institute_name">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][group]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.group">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][result]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.result">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'educations[' + index + '][passing_year]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.passing_year">
                                                            </td>
                                                            <td style="padding: 0px">
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    @click="delete_row(row)"><i
                                                                        class="fa fa-times"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><span style="border-bottom:3px solid #ebe9f1;padding:5px;">Bank</span></h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="account_title">Account title</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="account_title" placeholder="Account Title">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="account_number">Account Number</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="account_number" placeholder="Account Number">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="branch_name">Branch Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="branch_name" placeholder="Enter Branch Name">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="bank_name">Bank Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        v-model="bank_name" placeholder="Enter Bank Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-2 col-12">
                                                <div class="form-group">
                                                    <button type="button" @click="select_bank()"
                                                        class="btn btn-sm btn-outline-primary btn-block mb-2"><i
                                                            class="fa fa-plus-circle"></i> Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Account Number</th>
                                                            <th>Branch Name</th>
                                                            <th>Bank Name</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr v-for="(row, index) in bank_items">
                                                            <td>
                                                                <input type="text"
                                                                    :name="'banks[' + index + '][account_no]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.account_number">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'banks[' + index + '][branch_name]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.branch_name">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    :name="'banks[' + index + '][bank_id]'"
                                                                    class="form-control input-sm"
                                                                    v-bind:value="row.bank_name">
                                                            </td>

                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    @click="delete_bank_row(row)"><i
                                                                        class="fa fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary waves-effect waves-float waves-light float-right"
                                        type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var app = new Vue({
                el: '#vue_app',
                data: {
                    config: {
                        get_education_url: "{{ url('fetch-get_education_url-by-user-id') }}",
                    },

                    bank_items: [],
                    account_number: '',
                    branch_name: '',
                    bank_name: '',

                    profession_items: [],
                    job_title: '',
                    company_name: '',
                    from_date: '',
                    to_date: '',
                    responsibility: '',

                    items: [],
                    education_level: '',
                    degree_title: '',
                    board: '',
                    institute_name: '',
                    group: '',
                    result: '',
                    passing_year: '',
                    user_id: '',
                },
                methods: {
                    fetch_education() {
                        let vm = this;
                        let slug = vm.user_id;
                        //   alert(slug);
                        if (slug) {
                            axios.get(this.config.get_education_url + '/' + slug).then(
                                function(response) {
                                    details = response.data;
                                    console.log(details);
                                    vm.items = details.education;
                                }).catch(function(error) {
                                toastr.error('Something went to wrong', {
                                    closeButton: true,
                                    progressBar: true,
                                });
                                return false;
                            });
                        }
                    },
                    select_professions() {
                        var vm = this;
                        var slug = vm.job_title;
                        if (slug) {
                            vm.profession_items.push({
                                job_title: slug,
                                company_name: vm.company_name,
                                from_date: vm.from_date,
                                to_date: vm.to_date,
                                responsibility: vm.responsibility,
                            });
                            vm.job_title = '';
                            vm.company_name = '';
                            vm.from_date = '';
                            vm.to_date = '';
                            vm.responsibility = '';
                        }
                    },
                    select_bank() {
                        var vm = this;
                        var slug = vm.account_number;
                        if (slug) {
                            vm.bank_items.push({
                                account_number: slug,
                                branch_name: vm.branch_name,
                                bank_name: vm.bank_name
                            });
                            vm.account_number = '';
                            vm.branch_name = '';
                            vm.bank_name = '';
                        }
                    },
                    select_item() {
                        var vm = this;
                        var slug = vm.education_level;
                        if (slug) {

                            vm.items.push({
                                education_level: slug,
                                degree_title: vm.degree_title,
                                board: vm.board,
                                institute_name: vm.institute_name,
                                group: vm.group,
                                result: vm.result,
                                passing_year: vm.passing_year,
                            });
                            vm.education_level = '';
                            vm.degree_title = '';
                            vm.board = '';
                            vm.institute_name = '';
                            vm.group = '';
                            vm.result = '';
                            vm.passing_year = '';
                        }
                    },
                    delete_row: function(row) {
                        this.items.splice(this.items.indexOf(row), 1);
                    },
                    delete_profession_row: function(row) {
                        this.profession_items.splice(this.profession_items.indexOf(row), 1);
                    },
                    delete_education_row: function(row) {
                        this.education_items.splice(this.education_items.indexOf(row), 1);
                    },
                    delete_bank_row: function(row) {
                        this.bank_items.splice(this.bank_items.indexOf(row), 1);
                    },

                },
                beforeMount() {
                    this.fetch_education();
                },
                updated() {
                    $('.bSelect').selectpicker('refresh');
                }
            });
            $('.bSelect').selectpicker({
                liveSearch: true,
                size: 5
            });
        });
    </script>
@endpush
