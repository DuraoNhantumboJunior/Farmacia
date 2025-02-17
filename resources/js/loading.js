// Exibe o loading enquanto a página está carregando
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('loading').style.display = 'flex';
});

window.addEventListener("load", function () {
    document.getElementById('loading').style.display = 'none';
});

// Exibe o loading durante requisições AJAX (necessário jQuery)
if (typeof jQuery !== 'undefined') {
    $(document).on({
        ajaxStart: function () {
            document.getElementById('loading').style.display = 'flex';
        },
        ajaxStop: function () {
            document.getElementById('loading').style.display = 'none';
        }
    });
}
