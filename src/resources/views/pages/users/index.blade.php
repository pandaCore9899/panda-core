@extends('layouts.layout')
@section('content')
    <div class="panda-section lightning-box-shadow-all padding-5">
        <div class="panda-row">
            @include('layouts.content.options')
            <div class="panda-list__table padding-5">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10px"><input type="checkbox" /></td>
                            <th>Basic</th>
                            <th>Pro</th>
                            <th>Pro</th>
                            <th style="width:10px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td><i class="fa fa-remove"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td>
                                @include('components.table.dropdown')
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><span class="material-icons md-18 panda-list__opt_icon">more_vert</span></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><span class="material-icons md-18 panda-list__opt_icon">more_vert</span></td>
                        </tr>
                    </tbody>

                </table>
                <div class="is-flex">
                    <div class="panda-list__table__perpage panda-center" style="min-width: 20%">
                        <span>Showing &nbsp;</span>
                        @include(viewDefault('components.form.select'), [
                            'is_flex' => true,
                            'name' => 'perpage',
                            // 'label' => 'Showing',
                            'data' => [
                                10 => 10,
                                100 => 100,
                                1000 => 1000,
                            ],
                            'extend_class' => 'panda-center',
                            'select_extend_style' => 'height:20px;',
                        ])
                        <span>&nbsp;<b>/100</b> entries</span>
                    </div>
                    <div class="panda-list__table__pagination width-80" style="display:flex;justify-content: flex-end;">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a class="active" href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
