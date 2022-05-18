@php
$breadcrumbs = make_breadcrumb();
@endphp
<ul class="panda-breadcrumb">
    @foreach ($breadcrumbs as $key => $value)
        @if ($value == end($breadcrumbs))
            <li class="panda-breadcrumb active">{{ $value }}</li>
        @else
            <li><a href="#">{{ $value }}</a></li>
        @endif
    @endforeach
</ul>
