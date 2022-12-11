
<div class="media">
    <div class="media-aside align-self-center">
        @if ($expense->photo_url)
        <a target="_blank" href="{{asset('storage/expenses/'.$expense->photo_url)}}" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
            <span class="b-avatar-img">
                <img src="{{asset('storage/expenses/'.$expense->photo_url)}}" style="width: 40px; height: 40px;" class="">
            </span>
        </a>
        @else
        <a target="_blank" href="{{asset('admin/app-assets/images/avatars/no_image_available.png')}}" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
            <span class="b-avatar-img">
                <img src="{{asset('admin/app-assets/images/avatars/no_image_available.png')}}" style="width: 40px; height: 40px;" class="">
            </span>
        </a>
        @endif

    </div>
    <div class="media-body">
        
    </div>
</div>