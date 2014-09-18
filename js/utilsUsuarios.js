$(document).ready(function() {
	
	$("#tabelaUsuarios").tablesorter({
		headers: {
			0: { sorter: false },
			1: { sorter: true },
			2: { sorter: true },
			3: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });;
	
	$("#tabelaRanking").tablesorter({
	    headers: {
	        0: { sorter: true },
	        1: { sorter: true },
	        2: { sorter: true }
	    }
	});
	
});