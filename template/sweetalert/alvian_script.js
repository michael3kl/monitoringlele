const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        title : '' + flashdata,
        text: '',
        type: 'success'
    });
}

// tombol hapus

$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    var href = $(this).attr('href');
    var nama = $(this).attr('data-nama');
    Swal.fire({
        title: 'Yakin akan menghapus '+nama,
        text: '',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});