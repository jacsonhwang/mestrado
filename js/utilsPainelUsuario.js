$(document).ready(function(){
	
	$('.bxslider').bxSlider();
	
	$("#buttonTutorial").click(function() {
		window.location = 'tutorial.php';
	});

	$(".tooltipJogo").tipsy({});
	$(".tooltipQualificacao").tipsy({});
	$(".tooltipOutros").tipsy({});
	
	$(".tabela-ranking").tablesorter();
	
});