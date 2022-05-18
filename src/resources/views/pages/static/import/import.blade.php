@extends('layouts.layout', [
    'no_frame' => true,
])
@section('content')
    <div class="panda-import__wrapper">
        <div class="panda-import__header">
            Importing
        </div>
        <div class="panda-import__content">
            @include('components.validation.alert.error', [
                'error_type' => 'import_error',
            ])
            <form enctype="multipart/form-data" action="{{ url()->current() . '.confirm' }}" method="POST"
                class="panda-row is-flex panda-import__form">
                @csrf
                <div class="col-md-3">
                    <div class="is-flex height-100">
                        <div for="staticEmail2" class="col-md-7 panda-center">
                            {{ trans('common.function.import.import_type') }}</div>
                        <div class="col-md-5" style="padding:0">
                            <select class="form-select" aria-label="Default select example" name="import_type" value = "{{old('import_type')}}">
                                <option value="1">New Data</option>
                                <option value="2">Update Data</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="is-flex height-100">
                        <input class="form-control height-100" type="file" id="formFile" name="import_file"
                            value="{{ old('import_file') ?? '' }}">
                    </div>
                </div>
                <div class="col-md-3 panda-center">
                    <button class="btn btn-primary"
                        type="submit">{{ trans('common.function.import.import_button') }}</button>
                </div>
            </form>
            <hr>


        </div>

    </div>
@endsection
