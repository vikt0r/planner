$(function(){
	console.log('running common.js');
	



	//login event
	// variable to hold request
	var request;
	// bind to the submit event of our form
	$("#loginuser").submit(function(event){
	    // abort any pending request
	    if (request) {
	        request.abort();
	    }
	    // setup some local variables
	    var $form = $(this);
	    // let's select and cache all the fields
	    var $inputs = $form.find("input, select, button, textarea");
	    // serialize the data in the form
	    var serializedData = $form.serialize();

	    // let's disable the inputs for the duration of the ajax request
	    // Note: we disable elements AFTER the form data has been serialized.
	    // Disabled form elements will not be serialized.
	    $inputs.prop("disabled", true);
	    console.log('serialized'); console.log(serializedData)

	    console.log($form.attr('action'));
	    console.log($form);
	    // fire off the request to /form.php
	    request = $.ajax({
	        url: $form.attr('action'),
	        type: "post",
	        data: serializedData
	    });

	    // callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        // log a message to the console
	        console.log(response);
	        if ( response.code == 1 )
	        {
	        	console.log(response.msg);
	        	// location.reload(false);
	        	window.location.href = window.location.href; //refresh with cache
	        }
	        else if ( response.code == 0)
	        {
	        	console.log(response.msg);
	        }
	   
	    });

	    // callback handler that will be called on failure
	    request.fail(function (jqXHR, textStatus, errorThrown){
	        // log the error to the console
	        console.error(
	            "The following error occured: "+
	            textStatus, errorThrown
	        );
	    });

	    // callback handler that will be called regardless
	    // if the request failed or succeeded
	    request.always(function () {
	        // reenable the inputs
	        $inputs.prop("disabled", false);
	    });

	    // prevent default posting of form
	    event.preventDefault();
	});
	// #end login


})// #END DOCREADY