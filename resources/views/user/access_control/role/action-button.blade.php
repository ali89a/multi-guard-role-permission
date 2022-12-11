@php
    $actions = [
                    'edit'=>route('user.roles.edit', $role->id),
                    'delete'=>route('user.roles.destroy', $role->id),
                ];
@endphp

<div class="d-flex justify-content-center">
    <x-action-component :actions="$actions" status="{{ $role->status }}" />
</div>
