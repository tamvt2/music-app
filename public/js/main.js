$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $(".removeRow").click(function (e) {
        e.preventDefault();
        if (confirm("Xóa mà không thể khôi phục. Bạn có chắc?")) {
            var id = $(this).data("id");
            var url = $(this).data("url");

            var data = {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: id,
            };

            $.ajax({
                url: url,
                type: "DELETE",
                data: data,
                success: function (result) {
                    alert(result.message);
                    if (result.error === false) {
                        location.reload();
                    }
                },
            });
        }
    });
});
