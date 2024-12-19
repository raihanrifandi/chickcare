$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        let value = $(this).val().toLowerCase();
        $("#penyakitTableBody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});