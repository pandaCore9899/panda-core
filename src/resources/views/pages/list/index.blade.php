@extends('layouts.layout')
@section('content')
    @if ($has_search ?? true)
        @include('pages.list.search')
    @endif
    <div class="panda-section lightning-box-shadow-all padding-5">
        <div class="panda-row">
            @include('pages.list.options')
            @include('pages.list.data')
        </div>
    </div>
@endsection
