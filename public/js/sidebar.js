$(document).ready(function () {
    // Toggle Sidebar when the menu button is clicked
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });

    // Close the sidebar when the user clicks outside of it
    $(document).on("click", function (e) {
        if (
            !$(e.target).closest("#sidebar").length &&
            !$(e.target).closest("#sidebarCollapse").length &&
            $("#sidebar").hasClass("active")
        ) {
            $("#sidebar").removeClass("active");
        }
    });
});
