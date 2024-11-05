// Exibe o loader enquanto a página está carregando
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('loader').style.display = 'flex';
});

window.addEventListener("load", function () {
    document.getElementById('loader').style.display = 'none';
});

// Exibe o loader durante requisições AJAX (necessário jQuery)
if (typeof jQuery !== 'undefined') {
    $(document).on({
        ajaxStart: function () {
            document.getElementById('loader').style.display = 'flex';
        },
        ajaxStop: function () {
            document.getElementById('loader').style.display = 'none';
        }
    });
}
