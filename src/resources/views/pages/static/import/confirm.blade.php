@extends('layouts.layout', [
    'no_frame' => true,
])
@section('content')
    <div class="panda-import__wrapper">
        <div class="panda-import__header">
            Import Confirm
        </div>

        <div class="padding-5 is-flex gap-10">
            <button type="button" class="btn btn-danger panda-center"
                onclick="PANDA.pandaRedirect('{{ current_page() . '.import' }}')">
                <span class="material-icons md-18">arrow_back</span>Back</button>
            @if (isset($isError) == null)
                <div style="flex:1" class="panda-end">
                    <button type="submit" class="btn btn-primary panda-center"
                        onclick="PANDA.list.importItems('{{ current_page() . '.import' }}')">
                        <span class="material-icons md-18 __show_modal">file_upload</span>Import
                    </button>
                </div>
            @endif
        </div>
        @include('components.validation.alert.error', [
            'error_type' => 'import_error',
        ])
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
                        'import_mode' => true
                    ])

                </div>
            </div>
        </div>
    </div>
@endsection
