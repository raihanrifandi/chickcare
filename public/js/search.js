$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        let value = $(this).val().toLowerCase();
        $("#penyakitTableBody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        let value = $(this).val().toLowerCase();
        $("#gejalaTableBody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        let value = $(this).val().toLowerCase();
        $("#riwayatTableBody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});