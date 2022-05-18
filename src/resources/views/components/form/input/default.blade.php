<div class="panda-input__wrapper {{ isset($is_flex) ? 'is-flex' : '' }} {{ $extend_class ?? '' }}">
    @if ($label ?? false)
        <div class="panda-form__label">
            <label for="">{{ $label }}</label>
        </div>
    @endif
    <div class="panda-input__form ">
        <input class = "{{ $input_class ?? '' }}" type={{ $type ?? 'text' }} value="{{ $val ?? '' }}" name="{{ $name ?? '' }}"
            id="{{ $id ?? '' }}">
    </div>
</div>
