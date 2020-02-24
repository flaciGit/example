$(document).ready(function() {

	// table seasrch / pagination
    var table = $('#listtable').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		"lengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
    } );
	
	// input validation
	jQuery.validator.setDefaults({
	  debug: false,
	  success: "valid"
	});
	$( "#createform" ).validate({
	  rules: {

		username: {
		  required: true,
		  maxlength: 50,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		email: {
		  required: true,
		  maxlength: 50
		},
		password: {
		  required: true,
		  maxlength: 16,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		intro: {
		  required: true,
		  maxlength: 500
		}
		
	  }
	});
	$( "#updateform" ).validate({
	  rules: {
		name: {
		  required: true,
		  maxlength: 100
		},
		username: {
		  required: true,
		  maxlength: 50,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		email: {
		  required: true,
		  maxlength: 50
		},
		password: {
		  required: true,
		  maxlength: 16,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		intro: {
		  required: true,
		  maxlength: 500
		}
		
	  }
	});
	
	
	
	
} );