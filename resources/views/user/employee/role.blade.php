@if($user->getRoleNames()->isNotEmpty())
<span class="badge rounded-pill badge-light-primary me-1">
    {!! $user->getRoleNames()->implode("</span> <span class='badge badge-primary'>") !!}
</span>
@endif