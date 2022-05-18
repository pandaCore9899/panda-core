@extends('layouts.layout', [
    'no_frame' => true,
])
@section('content')
@php
    dump(url());
@endphp
    <div class="panda-import__wrapper">
        <div class="panda-import__header">
            Import Confirm
        </div>
        <div class="panda-import__content">
            @include('components.validation.alert.error', [
                'error_type' => 'import',
            ])
        </div>
        <div class="padding-5">
            <button type="button" class="btn btn-danger panda-center" onclick="history.go(-1)">
                <span class="material-icons md-18">arrow_back</span>Back</button>
        </div>
        <div class="width-100 panda-center gap-10" style="flex-wrap: wrap">
            <button type="button" class="btn btn-primary panda-center">
                <span class="material-icons md-18 __show_modal">file_upload</span>Import
            </button>
           
        </div>
        <div class="panda-row panda-center padding-5">
            <div class="panda-section lightning-box-shadow-all width-90">
                <div class="panda-row">
                    @include('pages.list.data', [
                        'data' => $data,
                        'columns' => $columns,
                        'limit_options' => $limit_options,
                        'extends_class' => [
                            'panda-data' => 'width-100',
                        ],
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
