checkUrlSidebar();

$(document).ready(() => {
    window.scrollTo(0, 0);

    Alerts();
});

function Alerts() {
    const alertError = $(".alert-error");
    const alertMessage = $(".alert-message");

    setTimeout(() => {
        alertError.hide("slide", { direction: "left" }, 400);
    }, 3500);
    setTimeout(() => {
        alertMessage.hide("slide", { direction: "left" }, 400);
    }, 3500);
}

function checkUrlSidebar() {
    if (window.location.href.indexOf('/catalogos') > -1) {
        $('.catalogos-link').attr('aria-expanded', true);
        $('.collapse-catalogos').addClass('show');
        $('#catalogos-inactive-icon').hide();
        $('#catalogos-active-icon').removeClass('d-none');
        $('#catalogos-active-icon').show();
    }

    if (window.location.href.indexOf('/reportes') > -1) {
        $('.reportes-link').attr('aria-expanded', true);
        $('.collapse-reportes').addClass('show');
        $('#reportes-inactive-icon').hide();
        $('#reportes-active-icon').removeClass('d-none');
        $('#reportes-active-icon').show();
    }

    if (window.location.href.indexOf('/herramientas') > -1) {
        $('.herramientas-link').attr('aria-expanded', true);
        $('.collapse-herramientas').addClass('show');
        $('#herramientas-inactive-icon').hide();
        $('#herramientas-active-icon').removeClass('d-none');
        $('#herramientas-active-icon').show();
    }
}
