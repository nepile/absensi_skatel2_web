$(document).ready(function () {
    $("form").submit(function () {
        // Show the loading popup and overlay when the form is submitted
        $("#loading-popup").show();
        $("#loading-overlay").show();
    });
});
