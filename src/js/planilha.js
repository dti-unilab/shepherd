

$(document).ready(function(e) {
	$("#insert_form_planilha").on('submit', function(e) {
		e.preventDefault();
        
        var dados = new FormData(this);
        
		jQuery.ajax({
            type: "POST",
            url: "index.php?ajax=planilha",
            data: dados,
            success: function( data )
            {
            

            	if(data.split(":")[1] == 'sucesso'){
            		
            		$("#botao-modal-resposta").click(function(){
            			window.location.href='?page=planilha';
            		});
            		$("#textoModalResposta").text("Planilha enviado com sucesso! ");                	
            		$("#modalResposta").modal("show");
            		
            	}
            	else
            	{
            		
                	$("#textoModalResposta").text("Falha ao inserir Planilha, fale com o suporte. ");                	
            		$("#modalResposta").modal("show");
            	}

            },
            cache: false,
            contentType: false,
            processData: false,
            xhr: function() { // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
		
		
	});
	
	
});
   
