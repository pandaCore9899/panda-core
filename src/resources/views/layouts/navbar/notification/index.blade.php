<div class="panda-navbar__notification">
    @foreach (['email','notifications','email','light_mode'] as $icon)
        @include('layouts.navbar.notification.icons', [
            'name' => $icon,
            'size' => 43,
            'count' => 10
        ])
    @endforeach
</div>