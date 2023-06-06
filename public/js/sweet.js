(function () {})();

function deleteButton(id) {
    Swal.fire({
        title: "Are you sure ?",
        text: "Deleted data cannot be restored!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes!",
        cancelButtonText: "Cancel",
    }).then(result => {
        if (result.isConfirmed) {
            // Mengarahkan pengguna ke rute delete setelah mengkonfirmasi
            window.location.href = `/organization/delete/${id}`;
            Swal.fire({
                icon: "success",
                title: "Data has been deleted!",
                showConfirmButton: false,
                timer: 1500,
            });
        } else {
            // Pengguna membatalkan penghapusan
            Swal.fire("Cancel", "Data not deleted.", "info").then(() => {
                // Mengarahkan pengguna kembali ke halaman sebelumnya
                window.history.back();
            });
        }
    });
}
