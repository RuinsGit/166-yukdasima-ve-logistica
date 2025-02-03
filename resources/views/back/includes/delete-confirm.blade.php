<script>
function deleteData(id) {
    Swal.fire({
        title: 'Silmək istədiyinizdən əminsiniz?',
        text: "Bu əməliyyat geri alına bilməz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Bəli, sil!',
        cancelButtonText: 'Ləğv et'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script> 