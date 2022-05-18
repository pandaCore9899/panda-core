<div class=" panda-search__extend">
    <div class="panda-panel">
        <div class="panda-row is-flex gap-10">
            @include(viewDefault('components.form.input'), [
                'label' => 'My input',
                'name' => 'test_input',
            ])
            @include(viewDefault('components.form.select'), [
                'label' => 'My select',
                'name' => 'test_select',
                'data' => [
                    1 => 'One',
                    2 => 'True',
                ],
            ])

        </div>
        <div class="row panda-center">
            <button class="btn btn-primary panda-center"><span class="material-icons md-18">search</span>Search</button>
        </div>
    </div>
    <a class="panda-accordion is-flex" style="justify-content:flex-start"
        onclick="PANDA.accordion.previous(this,'expand_more','expand_less','Search options', 'Hide Search Options')">
        <span class="panda-accordion__label">Search options</span>
        <span class="material-icons">expand_more</span>
    </a>
</div>