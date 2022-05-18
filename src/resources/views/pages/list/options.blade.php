<button class="btn btn-primary" style="max-height:30px" onclick="PANDA.accordion.next(this)">
    <span class="material-icons md-18">more_horiz</span>
</button>
<div class="width-100 panda-center gap-5 panda-panel " style="flex-wrap: wrap">
    <button type="button" class="btn btn-success panda-center btn-option" onclick="PANDA.toast.init('helloword','success')">
        <span class="material-icons md-18">add</span><span>Create</span></button>
    <button type="button" class="btn btn-primary panda-center btn-option" onclick="customToast()">
        <span class="material-icons md-18 btn-export">file_download</span>Export</button>
    <button type="button" class="btn btn-primary panda-center btn-option __show_modal" onclick="PANDA.modal.showModal('{{ url()->current() . '.import' }}',{
        'isIframe': true,
        'className':'modal__75'
    })">
        <span class="material-icons md-18 __show_modal">file_upload</span>Import
    </button>
    <button type="button" class="btn btn-danger panda-center  btn-option" onclick="PANDA.list.deleteItems()">
        <span class="material-icons md-18">delete</span>Delete</button>
</div>