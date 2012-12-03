/*
 * Script responsável por dar efeito na tabela
 */
$(document).ready(function(){
   $('tbody tr:odd').addClass('impar');
   
   $('tbody tr').hover(
       function (){$(this).addClass('destacar')},
       function (){$(this).removeClass('destacar')}
       );
});