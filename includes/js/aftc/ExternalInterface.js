function getFlashMovie(swfName) {
	return swfobject.getObjectById(swfName);
}   

function getStringFromSWF(str) 
{   
	return str;
}

function sendStringToSWF(swfName,str,formElementToPopulateWithValue,htmlElementToPopulateWithValue,alertDetails) 
{      
	if (formElementToPopulateWithValue != null){
		var target = document.getElementById(formElementToPopulateWithValue);
		target.value = str;
	}
	
	if (htmlElementToPopulateWithValue != null){
		var target = document.getElementById(htmlElementToPopulateWithValue);
		target.innerHTML = str;
	}
	
	if (alertDetails != null){
		alertDetails(str);
	}
	
	getFlashMovie(swfName).sendTextToFlash(str);
}  