<div class="panda-dropdown__wrapper {{ $wrapper_class ?? '' }} panda-close-not-click">
    <div class="panda-dropdown__toggle {{ $toggle_class ?? '' }}" onclick="PANDA.commonDropdown.dropdown(this)">
        <div class="panda-icon panda-icon-{{ $type ?? 'cycle' }}-{{ $size ?? 41 }} panda-dropdown__change-color">
            @if ($count ?? false)
                <div class="panda-icon-count-{{ $size ?? 41 }} {{ $count >= 100 ? 'panda-icon-count-100' : '' }}">
                    {{ $count >= 100 ? '99+' : $count }}
                </div>
            @endif
            <i class=" material-icons md-{{ $mode ?? 'dark' }}">
                {{ $name }}
            </i>
        </div>
    </div>
    <div class="panda-dropdown__container {{ $container_class ?? '' }} panda-close-not-click">
        @include('layouts.navbar.notification.dropdown', [
            'notifications' => ['one', 'two', 'three', 'four', 'five'],
            'icon' => $name,
            'count' => $count,
        ])
    </div>
</div>
