function capitalize_Words(str)
{
return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function loading()
{
    $('#loader').show();
    $('.div-loading').addClass('background-load');
}
function matikanLoading()
{
    $('#loader').hide();
    $('.div-loading').removeClass('background-load');
}