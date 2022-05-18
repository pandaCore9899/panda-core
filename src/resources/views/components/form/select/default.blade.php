<div class="panda-select__wrapper {{ isset($is_flex) ? 'is-flex' : '' }} {{ $extend_class ?? '' }}">
    @if ($label ?? false)
        <div class="panda-form__label">
            <label for="">{{ $label ?? '' }}</label>
        </div>
    @endif
    @php
    @endphp
    <div class="panda-select__form">
        <select name="{{ $name ?? '' }}" id="" class="{{ $select_extend_class ?? '' }}"
            style="{{ $select_extend_style ?? '' }}" onchange="{{ $onchange ?? '' }}">
            @if ($data ?? false)
                @foreach ($data as $key => $value)
                    <option value="{{ $value }}"
                        {{ isset($default_val) && $value == $default_val ? 'selected' : '' }}> {{ $value }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
</div>
