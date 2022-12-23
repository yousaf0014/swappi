/////////////////////////////////////////////////////////

var formSubmitting = false;

var setFormSubmitting = function(){ 
	formSubmitting = true; 
};

var unsaved = false;

// Monitor dynamic inputs
$(document).on('change', ':input', function(){ //triggers change in all input fields including text type
    unsaved = true;
});

// Another way to bind the event
$(window).bind('beforeunload', function(){
	if(unsaved && !formSubmitting){
		
		//showConfirmYesNo();
        //return confirm("Du har ikke gemt. Er du sikker på, at du vil forlade siden?");

        
        return false;
    }
});

var showConfirmYesNo = function(){
	$('#confirm').modal({
		backdrop: 'static',
		keyboard: false
    })
    .one('click', '#yes', function(e) {
		return true;
    })
    .one('click', '#no', function(e) {
		return false;
    });
}
