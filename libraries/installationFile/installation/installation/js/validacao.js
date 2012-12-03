/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#installation").validate({
        rules:{
            host_data_base:{required:true},
            db_name:{required:true},
            user_data_base:{required:true},
            host_email:{required:true},
            user_email:{required:true},
            pass_email:{required:true},
            port_access:{required:true}
        },
        messages:{
            host_data_base:{required:"Campo Obrigatório!"},
            db_name:{required:"Campo Obrigatório!"},
            user_data_base:{required:"Campo Obrigatório!"},
            host_email:{required:"Campo Obrigatório!"},
            user_email:{required:"Campo Obrigatório!"},
            pass_email:{required:"Campo Obrigatório!"},
            port_access:{required:"Campo Obrigatório!"}
        }
    });
});