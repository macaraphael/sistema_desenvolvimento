function EmptyField(id) {
    var Fid = document.getElementById(id);
    var TheDefaultValue = Fid.defaultValue;
    var TheValue = Fid.value;
    //alert(TheDefaultValue+" "+TheValue)
    if(TheDefaultValue == TheValue){
        Fid.value = '';
    }

    $('#busca').value('');
 }

 function mostrarTexto(id){

 }