function bloquear_ctrl_j(){
	if (window.event.ctrlKey && window.event.keyCode == 74){
		event.keyCode = 0;
		event.returnValue = false;
	}
}

$(document).ready(function(e) {
	$( "#matricula" ).focus();      
	$("#insert_form_aluno").on('submit', function(e) {
		e.preventDefault();
        
		var dados = jQuery( this ).serialize();
        
		jQuery.ajax({
            type: "POST",
            url: "index.php?ajax=aluno",
            data: dados,
            success: function( data )
            {
            

				console.log(data);
            	if(data.split(":")[1] == 'sucesso'){
            		

            		$("#alerta_sucesso").collapse('show');
					$("#alerta_sucesso").text("Aluno atualizado com sucesso, faça o próximo! ");    
					$('#campo_codigo_chip').collapse('hide');   
					$('#matricula').val('');  
					$('#codigo_chip').val('');  
					$( "#matricula" ).focus();         
            		
            	}
				else if(data.split(":")[1] == 'encontrado'){
					$("#alerta_erro").collapse('hide');
					$('#campo_codigo_chip').collapse('show');   
					$( "#codigo_chip" ).focus();        	
            		
				}else if(data.split(":")[1] == 'nao_encontrado'){
					$("#alerta_sucesso").collapse('hide');
					
					
					$("#alerta_erro").text('Aluno Não Encontrado, tente novamente! ');
					$("#alerta_erro").collapse('show');
					
					$( "#matricula" ).focus();     
					$('#campo_codigo_chip').collapse('hide');
					$('#matricula').val('');  
					$('#codigo_chip').val(''); 
					   

				}
            	else
            	{
					$("#alerta_sucesso").collapse('hide');
					$("#alerta_erro").collapse('show');
    				$("#alerta_erro").text('Falha ao tentar atualizar, tente novamente!');
        			$('#matricula').val('');  
					$('#codigo_chip').val(''); 
                	
            	}

            }
        });
		
		
	});
	
	
});
   
