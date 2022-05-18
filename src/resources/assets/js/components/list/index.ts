import { pandaAjax, pandaReload, sendAjaxRequest } from "../../utils";
import Swal from 'sweetalert2';
import toast from "../toast";

function checkAll(element: HTMLInputElement) {

    if (element.checked == false) {
        $('.select-row').prop('checked', false);
    } else {
        $('.select-row').prop('checked', true);
    }
}

function importItems(path: string) {
    console.log(path,);
    pandaAjax(path, null).then(res => {
        console.log(res.status)
        if (res.status == 200) {
            toast.init('Import Successfully', 'success');
            pandaReload(3, true);

        }
    })
}
function deleteItems() {
    let ids: string[] = [];
    let checkedAll = $('input[name="item_check_all"]:checked')[0];
    let path = window.location.href.split('?')[0]

    if (checkedAll) {
        Swal.fire({
            title: 'Are you sure?',
            html: `<p>You won't be able to revert this!</p><p>ID: ALL</p>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: path + '.delete',
                    data: {
                        'delete_all': true,
                    },
                }).then((res: any) => {
                    console.log(res)
                    if (res.status == 200) {

                        toast.init('Delete Successfully', 'success');
                        pandaReload(2);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Cannot delete items!',
                        })
                    }
                }).catch((e) => {
                    console.log(e);
                })
            }
        })
    } else {

        $('.select-row:checked').each(function () {
            ids.push($(this).attr('_id'));
        })
        if (ids.length > 0) {
            Swal.fire({
                title: 'Are you sure?',
                html: `<p>You won't be able to revert this!</p><p>IDS: [${ids}] </p>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<span class="material-icons md-18">close</span>Cancel',
                confirmButtonText: '<span class="material-icons md-18">delete</span>Delete',
                customClass: {
                    confirmButton: 'panda-center',
                    cancelButton: 'panda-center'
                }

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: path + '.delete',
                        data: {
                            'ids': ids
                        },
                    }).then((res: any) => {
                        console.log(res)
                        if (res.status == 200) {
                            toast.init('Delete Successfully!', 'success', true)
                            pandaReload(2);
                        } else {
                            toast.init('Cannot delete items!', 'error', false)
                        }
                    }).catch((e) => {
                        console.log(e);
                    })
                }
            })
        } else {
            toast.init('Please choice the records which you want to delete!', 'error', false)
        }

    }
}

function setLimit(limit: string) {
    console.log(window.location.href)
    if ('URLSearchParams' in window) {
        var searchParams = new URLSearchParams(window.location.search)
        searchParams.set('limit', limit);
        var newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
        location.href = newRelativePathQuery;
    }

}
export default {
    checkAll,
    deleteItems,
    setLimit,
    importItems
}