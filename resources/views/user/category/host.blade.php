<!-- <span class="text-nowrap">
    <span class="b-avatar">
        <span class="b-avatar-img">
            @if ($room->user->photo_url)
            <img src="{{$room->user->photo_url}}" style="width: 40px; height: 40px; border-radius: 50%;" class="img-thumbnail">
            @else
            <img src="http://127.0.0.1:8000/admin/app-assets/images/portrait/small/avatar-s-11.jpg" style="width: 40px; height: 40px; border-radius: 50%;" class="img-thumbnail">
        
            @endif
           </span>
    </span>
    <span class="text-nowrap"><a href="" target="_blank">{{$room->user->name}}</a></span>
</span>
 -->
<div class="media">
    <div class="media-aside align-self-center">
        @if ($room->user->photo_url)
        <a href="{{asset('storage/users/'.$room->user->photo_url)}}" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
            <span class="b-avatar-img">
                <img src="{{asset('storage/users/'.$room->user->photo_url)}}" style="width: 40px; height: 40px; border-radius: 50%;" class="">
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
            {{$room->user->name ?? ''}}
        </a> <small class="text-muted"><span>@</span>{{$room->user->phone ?? ""}}</small>
    </div>
</div>