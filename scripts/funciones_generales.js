function msg_error_redirect(mensaje, url_redirect, tiempo_espera ) {
    alert(mensaje);
    setTimeout(function() {
        window.location.href = url_redirect;
    }, tiempo_espera); // El tiempo de espera es opcional y por defecto es 2000 milisegundos (2 segundos)
}