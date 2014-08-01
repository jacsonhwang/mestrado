$(document).ready(function() {

	// habilitar campo de formação acadêmica
	$('#selectEscolaridade').on('change', function(){
		if ($(this).val() <= parseInt("3"))
			$("#inputFormacaoAcademica").attr("disabled", true);
		else
			$("#inputFormacaoAcademica").removeAttr("disabled");
	});
	
	// impedir letras no campo de idade
	$("#inputIdade").keydown(function(event){
    
        if (event.keyCode >= 37 && event.keyCode <= 40) { 
              return event;
        }
        
        if((event.keyCode != 8) && !((event.keyCode > 47 && event.keyCode < 58) || (event.keyCode > 95 && event.keyCode < 106))){ 
            return false;
        }
    });
	
	/*$("#formCadastro").bootstrapValidator({
        excluded: ...,
        feedbackIcons: ...,
        live: 'enabled',
        message: 'This value is not valid',
        submitButtons: 'button[type="submit"]',
        trigger: null,
        fields: {
        	text: {
        		validators: {
        			notEmpty: {
        				message: "Favor preencher o campo."
        			}
        		}
        	}
        }
    });*/
});