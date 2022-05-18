@if ($icon ?? false)
    <div class="panda-sidebar__toggle__content__icon"><i class="material-icons .md-18">{{ $icon }}</i></div>
@endif
<div class="panda-sidebar__toggle__content">

    {{ getMenuItems($text) }}
</div>
@if ($has_sub)
    <div class="panda-dropdown-sidebar-icon">
        @if ($sub_selected)
            <span class="material-icons md-18">expand_more</span>
        @else
            <span class="material-icons md-18">chevron_right</span>
        @endif
    </div>
@endif
