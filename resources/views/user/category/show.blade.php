@extends('user.layouts.app')
@section('title', 'Room')
@section('content')
<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('dashboard'),
    'Room'=>route('user.rooms.index'),
    'Room Show'=>''
    ]
    @endphp
    <x-bread-crumb-component title='Room Show' :links="$links" />
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Room Messages</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>

                                    <tr>

                                        <th><strong>SL </strong></th>
                                        <th><strong>Sender </strong></th>
                                        <th><strong>Message </strong></th>
                                        <th><strong>Type </strong></th>
                                        <th><strong>Created At</strong></th>
                                    </tr>

                                    @forelse($room->messages as $room_message)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="media">
                                                <div class="media-aside align-self-center">
                                                    @if ($room_message->user->photo_url)
                                                    <a href="{{asset('storage/users/'.$room_message->user->photo_url)}}" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                        <span class="b-avatar-img">
                                                            <img src="{{asset('storage/users/'.$room_message->user->photo_url)}}" style="width: 40px; height: 40px; border-radius: 50%;" class="">
                                                        </span>
                                                    </a>
                                                    @else
                                                    <a href="{{asset('admin')}}/app-assets/images/portrait/small/avatar-s-11.jpg" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                        <span class="b-avatar-img">
                                                            <img src="{{asset('admin')}}/app-assets/images/portrait/small/avatar-s-11.jpg" style="width: 40px; height: 40px; border-radius: 50%;" class="">
                                                        </span>
                                                    </a>
                                                    @endif

                                                </div>
                                                <div class="media-body">
                                                    <a href="javascript:void(0);" class="font-weight-bold d-block text-nowrap" target="_self">
                                                        {{$room_message->user->name ?? ''}}
                                                    </a> <small class="text-muted"><span>@</span>{{$room_message->user->phone ?? ""}}</small>
                                                </div>
                                            </div>
                                        </td>
                                        @if($room_message->type == "PHOTO")
                                        <td>
                                            <img src="{{asset('storage/rooms/'.$room_message->message)}}" style="width: 40px; height: 40px; border-radius: 50%;" class="">
                                        </td>
                                        @else
                                        <td> {{$room_message->message ?? ''}}</td>
                                        @endif
                                        <td>{{$room_message->type ?? ''}}</td>
                                        <td>{{$room_message->created_at->diffForHumans() ?? ''}}</td>

                                    </tr>
                                    @empty
                                    <tr><td colspan="5" class="text-center">No Messages</td> </tr>
                                    @endforelse
                                </tbody>
                            </table>
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