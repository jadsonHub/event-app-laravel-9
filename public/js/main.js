setTimeout(function() {
    $('#msg').fadeOut('fast');
 }, 2000);

 function voltar(param = ''){
    if(param != ''){
        return window.location.href = param;
    }
    return  window.history.back();
}

$(document).ready(function(){
    $('#event_cep').mask('00000-000');
    $('#event_valor').mask("#.##0,00", {reverse: true});
});