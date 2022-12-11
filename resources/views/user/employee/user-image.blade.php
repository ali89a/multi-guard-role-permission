
<div class="media">
    <div class="media-aside align-self-center">
        @if (isset($row->user->photo_url))
        <a target="_blank" href="{{asset('storage/users/'.$row->user->photo_url)}}" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
            <span class="b-avatar-img">
                <img src="{{asset('storage/users/'.$row->user->photo_url)}}" style="width: 40px; height: 40px; border-radius: 50%;" class="">
            </span>
        </a>
        @else
        <a target="_blank" href="{{asset('admin/app-assets/images/avatars/pro.png')}}" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
            <span class="b-avatar-img">
                <img src="{{asset('admin/app-assets/images/avatars/pro.png')}}" style="width: 40px; height: 40px; border-radius: 50%;" class="">
            </span>
        </a>
        @endif

    </div>
    <div class="media-body">
        <a href="javascript:void(0);" class="font-weight-bold d-block text-nowrap" target="_self">
            {{$row->user->name ?? ''}}
        </a> <small class="text-muted"><span>@</span>{{$row->user->designation->name ?? ""}}</small>
    </div>
</div>
