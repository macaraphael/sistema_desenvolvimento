/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#login").validate({
        rules:{
            user:{required:true},
            pass:{required:true}
        },
        messages:{
            user:{required:"Campo Obrigatório!"},
            pass:{required:"Campo Obrigatório!"}
        }
    });
    $("#my_profile").validate({
        rules:{
            name:{required:true},
            user_name:{required:true},
        },
        messages:{
            name:{required:"Campo Obrigatório!"},
            user_name:{required:"Campo Obrigatório!"},
        }
    });
    $("#validar").validate({
        rules:{
            serial:{required:true},
        },
        messages:{
            serial:{required:"Campo Obrigatório!"},
        }
    });
});