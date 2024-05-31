$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function ($) {
    $(".btn-download").click(function () {
        const audioSrc = $("#audio").attr("src");
        const song_id = $("#audio").attr("data-id");

        // Tạo một thẻ <a> mới với href là src của audio
        var downloadLink = $("<a></a>");
        downloadLink.attr("href", audioSrc);

        // Trích xuất tên file từ src
        var fileName = audioSrc.substring(audioSrc.lastIndexOf("/") + 1);

        // Thiết lập thuộc tính download là tên file
        downloadLink.attr("download", fileName);

        // Gắn thẻ <a> vào body và click tự động
        $("body").append(downloadLink);
        downloadLink[0].click();

        // Xóa thẻ <a> sau khi đã tải xuống
        downloadLink.remove();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/add-download",
            data: { song_id: song_id },
            success: function (result) {},
        });
    });

    $(".btn-favorite").click(function () {
        const song_id = $("#audio").attr("data-id");

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/add-favorite",
            data: { song_id: song_id },
            success: function (result) {},
        });
    });
});
