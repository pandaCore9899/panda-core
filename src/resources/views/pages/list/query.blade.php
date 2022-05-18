<div class="is-flex gap-5">
    @include(viewDefault('components.form.select'), [
        'name' => 'query_select',
        'data' => [
            'name' => 'Name',
            'id' => 'ID',
        ],
        'select_extend_style' => 'min-width:100px',
    ])
    @include(viewDefault('components.form.input'), [
        'name' => 'query_input',
        'extend_class' => 'panda-query__input',
        'input_class' => 'width-80',
    ])
</div>
<hr>