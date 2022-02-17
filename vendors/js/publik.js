$(document).ready( function () {
    if ($('table').length === 1)
    {
        $('table').DataTable({
            'language': {
                'paginate': {
                    'previous': '<i class="bi bi-arrow-left-short"></i>',
                    'next': '<i class="bi bi-arrow-right-short"></i>',
                },
            },
            'ordering': true,
            'order': [[ 0, 'desc' ]],
            'columnDefs': [{
                targets: '_all',
                orderable: false,
            }],
            'scrollX': false,
        });
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 5000,
    width: '30rem',
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});

let jenis = '';
function unduhPerekapan(jenis) {
    Swal.fire({
        icon: 'question',
        text: 'Apakah Anda ingin mengunduh data rekap ' + jenis + '?',
        confirmButtonText: 'Iya',
        showCancelButton: true,
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = './unduh.php?jenis=' + jenis;
            Toast.fire({
                icon: 'success',
                text: 'Rekap ' + jenis + ' berhasil diunduh.',
            });
        }
    });
}

// DisableD Right Click
var message = '';
function clickIE() {
    if (document.all) {
        (message);return false;
    }
}
function clickNS(e) {
    if (document.layers||(document.getElementById&&!document.all)) {
        if (e.which==2||e.which==3) {
            (message);return false;
        }
    }
}
if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;
} else {
    document.onmouseup=clickNS;document.oncontextmenu=clickIE;
}
document.oncontextmenu=new Function('return false');