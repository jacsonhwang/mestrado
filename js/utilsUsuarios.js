/*$(document).ready(function() {
	
	$(".editarUsuario").click(function() {
		var email = $(this).parent().parent().find(".email").html();
		$(this).data("email", email);
		
		$("#inputNome").val(email);
		
		window.location = 'editar_usuario.php';
	});
	
	$(".visualizarUsuario").click(function() {
		$.ajax({
				type: "POST",
				url: "controller/tratarUsuarioControle.php",
				data: { email: email },
				async: false,
				success: function(msg) {
				}
			});
	});
	
});*/