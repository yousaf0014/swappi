function nl2br (str, is_xhtml) {   
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function isValidDate(ele) {
	var dateString = ele.value;
	var regEx = /^\d{2}\/\d{2}\/\d{4}$/;
	console.log(dateString.match(regEx));
	if(dateString.match(regEx) == null){
		ele.value = '';
		ele.focus();
	}else{
		return true;
	}
}

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});
