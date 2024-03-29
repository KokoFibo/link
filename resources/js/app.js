import "./bootstrap";

$(document).ready(function () {
    toastr.options = {
        progressBar: true,
        timeOut: "2000",
        progressBar: true,
        positionClass: "toast-top-right",
        closeButton: true,
        preventDuplicates: true,
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    window.addEventListener("success", (event) => {
        toastr.success(event.detail.message);
    });
    window.addEventListener("warning", (event) => {
        toastr.warning(event.detail.message);
    });

    window.addEventListener("info", (event) => {
        toastr.info(event.detail.message);
    });

    window.addEventListener("error", (event) => {
        toastr.error(event.detail.message);
    });
});
