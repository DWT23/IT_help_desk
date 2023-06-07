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
            $.ajax({
                method: "post",
                data: { id: id },
                url: `/users/delete/${id}`,
                beforeSend: function (xhr) {
                    let csrfToken = $('meta[name="csrf-token"]').attr("content");
                    xhr.setRequestHeader("X-CSRF-Token", csrfToken);
                },
            }).then(function () {
                window.location.href = `/users`;
                Swal.fire({
                    icon: "success",
                    title: "Data has been deleted!",
                    showConfirmButton: false,
                    timer: 1500,
                });
            });
        } else {
            Swal.fire("Cancel", "Data not deleted.", "info");
        }
    });
}
