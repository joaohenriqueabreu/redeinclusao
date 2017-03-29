$(document).ready(function () {
    $("form").submit(function () {
        $('#processing-modal').modal({
            "backdrop": "static",
            "keyboard": true,
            "show": true
        });
    });

    $(".datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });

    setInterval('$(".alert").remove();', 10000);

    $('#myModal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });

    $('#myLargeModalLabel').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });

    $('#subModal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });

    // trava a janela modal, com o fechamento só atraves de comando especifico
    $.fn.modal.Constructor.DEFAULTS.backdrop = 'static';


    /*
     var url = document.location.toString();
     if (url.match('#')) {
     $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
     }
     
     //Change hash for page-reload
     $('.nav-tabs a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
     window.location.hash = e.target.hash;
     });  */


    if ($("#selectAta").val() === 'S') {
        $("#periodoAta").show();
    } else {
        $("#periodoAta").hide();
    }

});

$(function () {
    // Change tab on load
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });

    // Change tab on hashchange
    window.addEventListener('hashchange', function () {
        var changedHash = window.location.hash;
        changedHash && $('ul.nav a[href="' + changedHash + '"]').tab('show');
    }, false);
});

// Adicionar Botão de esconder menu
$("[data-toggle='offcanvas']").click(function (e) {
    e.preventDefault();
    $('.sidebar').toggleClass("collapse-left");
    $("#page-wrapper").toggleClass("strech");
});

$("[data-toggle='collapse']").click(function (e) {
    e.preventDefault();
    $(".sidebar").removeClass("collapse-left");
    $("#page-wrapper").removeClass("strech");
});
// Fim Adicionar Botão de esconder menu

/**
 * Função para habilitar ou desabilitar filtro de período de atas em pesquisa de empresas
 */
$("#selectAta").change(function () {
    if ($(this).val() === 'S') {
        $("#periodoAta").show();
    } else {
        $("#periodoAta").hide();
    }
});