/* # Select2 dropdowns 
================================================== */

	
	//===== Datatable select =====//

	/*$(".dataTables_length select").select2({
		minimumResultsForSearch: "-1"
	});*/


	//===== Default select =====//

	$(".select").select2({
		minimumResultsForSearch: "-1",
		width: 200
	});


	//===== Liquid select =====//

	$(".select-liquid").select2({
		minimumResultsForSearch: "-1",
		width: "off"
	});


	//===== Full width select =====//

	$(".select-full").select2({
		minimumResultsForSearch: "-1",
		width: "100%"
	});


	//===== Select with filter input =====//

	$(".select-search").select2({
		width: 200
	});


	//===== Multiple select =====//

	$(".select-multiple").select2({
		width: "100%"
	});

	
	//===== Loading data select =====//

	$("#loading-data").select2({
		placeholder: "Enter at least 1 character",
        allowClear: true,
        minimumInputLength: 1,
        query: function (query) {
            var data = {results: []}, i, j, s;
            for (i = 1; i < 5; i++) {
                s = "";
                for (j = 0; j < i; j++) {s = s + query.term;}
                data.results.push({id: query.term + i, text: s});
            }
            query.callback(data);
        }
    });		


	//===== Select with maximum =====//

	$(".maximum-select").select2({ 
		maximumSelectionSize: 3, 
		width: "100%" 
	});		


	//===== Allow clear results select =====//

	$(".clear-results").select2({
	    placeholder: "Select a State",
	    allowClear: true,
	    width: 200
	});


	//===== Select with minimum =====//

	$(".minimum-select").select2({
        minimumInputLength: 2,
        width: 200
    });


	//===== Multiple select with minimum =====//

	$(".minimum-multiple-select").select2({
        minimumInputLength: 2,
        width: "100%" 
    });

	
	//===== Disabled select =====//

	$(".select-disabled").select2(
        "enable", false
    );

