// Var ini
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function log($str) {
	console.log($str);
}
function logTo($id, $msg) {
	$($id).html($msg);
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


function getUkDateFromDbDateTime($input){
	// "2016-04-08 21:11:59" to UK date
	if ($input == "" || $input == null){
		return "no input";
	}
	var $DateTime = $input.split(" ");
	var $DateParts = $DateTime[0].split("-");
	var $UKDate = $DateParts[2] + "/" + $DateParts[1] + "/" + $DateParts[0];
	return $UKDate;
}

function getUkDateTimeFromDbDateTime($input){
	// "2016-04-08 21:11:59" to UK date time
	var $DateTime = $input.split(" ");
	var $DateParts = $DateTime[0].split("-");
	var $TimeParts = $DateTime[1].split(":");
	var $UKDate = $DateParts[2] + "/" + $DateParts[1] + "/" + $DateParts[0];
	var $Time = $TimeParts[0] + ":" + $TimeParts[1];
	return ($UKDate + " " + $Time);
}

function isArrayInString($string, $array) {
	return (new RegExp('(' + $array.join('|').replace(/\./g, '\\.') + ')$')).test($string);
}


function getRandomHexColor() {
	var hex = Math.floor(Math.random() * 0xFFFFFF);
	return "#" + ("000000" + hex.toString(16)).substr(-6);
}


function scrollToElementID($id, $speed, $delay) {
	$id = $id.replace("#", ""); // Ensure we have something uniform to work with
	if (!$speed || $speed == null) {
		$speed = 1;
	}
	$speed *= 1000;

	if (!$delay || $delay == null) {
		$delay = 0;
	}
	$delay *= 1000;

	$('html, body').delay($delay).animate({
		scrollTop: $("#" + $id).offset().top
	}, $speed);
}


function isValidEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}


function randomString($length) {
	var text = "";
	var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

	for (var i = 0; i < $length; i++)
		text += possible.charAt(Math.floor(Math.random() * possible.length));

	return text;
}


function guid() {
	function s4() {
		return Math.floor((1 + Math.random()) * 0x10000)
			.toString(16)
			.substring(1);
	}

	return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
		s4() + '-' + s4() + s4() + s4();
}


function trimStringLength($input, $length) {
	return $input.substring(0, $length);
}


function getHSLColor(value) {
	//value from 0 to 1
	var hue = ((1 - value) * 120).toString(10);
	return ["hsl(", hue, ",100%,50%)"].join("");
}

function getRandomRGBString() {
	var $r = Math.round(Math.random() * 255);
	var $g = Math.round(Math.random() * 255);
	var $b = Math.round(Math.random() * 255);
	rgb = "rgb(" + $r + "," + $g + "," + $b + ")";
	return rgb;
}

function toggleSlideDownOnClass($class) {
	$("." + $class).slideToggle();
}

function toggleVisibilityOnClass($class) {
	$("." + $class).toggle();
}


function parseJSONFileToSelect($file, $element_id, $label_index, $value_index) {
	$.ajax({
		url: $file,
		type: 'POST',
		dataType: 'json',
		success: function ($response) {
			$.each($response, function ($key, $value) {
				//log($key + " = " + $value[$value_index]);

				var $select_label = $value[$label_index];
				var $select_value = $value[$value_index];
				//log("$select_label:" + $select_label + "   $select_value:" + $select_value);

				if ($select_label.toLowerCase() == "[div]") {
					$select_label = "-----------------------------";
					$select_value = "";
				}

				$('#' + $element_id).append(
						$('<option>')
						.text($select_label)
						.attr('value', $select_value)
					);
				});
		}
	});
}

function hideShow($ShowClassName, $HideClassName) {
	var $index;

	if (isArray($ShowClassName)) {
		for ($index in $ShowClassName) {
			var $ItemToShow = $ShowClassName[$index];
			log($ItemToShow);
			$("." + $ItemToShow).show();
		}
	} else {
		$("." + $ShowClassName).show();
	}


	if (isArray($ShowClassName)) {
		for ($index in $ShowClassName) {
			var $ItemToHide = $ShowClassName[$index];
			//log($ItemToHide);
			$("." + $ItemToShow).hide();
		}
	} else {
		$("." + $HideClassName).hide();
	}
}

function isArray(obj) {
	return obj.constructor == Array;
}


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function isFireFox() {
	var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
	return is_firefox;
}
function isChrome() {
	var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
	return is_chrome;
}
function isSafari() {
	var is_safari = navigator.userAgent.toLowerCase().indexOf('safari') > -1;
	return is_safari;
}
function isIE() {
	var is_firefox = navigator.userAgent.toLowerCase().indexOf('MSIE') > -1;
	return is_firefox;
}
function getIEVersion() {
	var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
	return match ? parseInt(match[1]) : undefined;
}
function get_browser() {
	var ua = navigator.userAgent, tem, M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
	if (/trident/i.test(M[1])) {
		tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
		return 'IE';
	}
	if (M[1] === 'Chrome') {
		tem = ua.match(/\bOPR\/(\d+)/);
		if (tem != null) {
			return 'Opera';
		}
	}
	M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
	if ((tem = ua.match(/version\/(\d+)/i)) != null) {
		M.splice(1, 1, tem[1]);
	}
	return M[0];
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function redirect($url) {
	self.location.href = $url;
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function boolToString($bool) {
	if ($bool) {
		return "true";
	} else {
		return "false";
	}
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


function aftcImageFitter($id) {
	$("#" + $id).css("backgroundSize", "auto");
}


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


/*
 * setFormFieldById
 * Finds a form element  by it's ID then set its value
 */
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function setFormFieldById($id, $value) {
	jQuery("#" + $id).val($value);
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function limitLengthInWords(field, maxWords) {
	var value = field.value,
		wordCount = value.split(/\S+/).length - 1,
		re = new RegExp("^\\s*\\S+(?:\\s+\\S+){0," + (maxWords - 1) + "}");
	if (wordCount >= maxWords) {
		field.value = value.match(re);
		document.getElementById('word_count').innerHTML = "";
		wcount_valid = true;
	} else {
		document.getElementById('word_count').innerHTML = (maxWords - wordCount) + " words remaining";
		wcount_valid = false;
	}

	return wcount_valid;
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function isChecked($id) {
	$element = document.getElementById($id);
	return $element.checked;
}


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function checkboxReveal($checkbox, $elementForStateChange, $showOnChecked) {
	$state = jQuery('input[name="' + $checkbox.id + '"]:checked').val();
	$state = $state.toLowerCase();
	
	if ($showOnChecked) {
		jQuery("#" + $elementForStateChange.id).slideDown($AnimSwitch);
	} else {
		jQuery("#" + $elementForStateChange.id).slideUp($AnimSwitch);
	}
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


function loadJSONFile($url, $callback) {
	/*
	 var $data = $.getJSON($file, function(result){
	 $.each(result, function(key, val){
	 //$("div").append(field + " ");
	 //log(val);
	 });
	 return result;
	 });
	 */

	var ajax = $.ajax({
		dataType: "json",
		url: $url,
		global: false,
		success: function (data) {
			$callback(data);
		},
		error: function (data) {
			var msg = "";
			msg += "loadJSONFile: ERROR\n";
			msg += "\t" + "URL: [" + $url + "]\n";
			msg += "\t" + "ID: [" + $id + "]\n";
			msg += "\t" + "method: [" + $method + "]\n";
			msg += "\t" + "data: [" + $data + "]\n";
			msg += "\t" + "status: [" + ajax.status + "]\n";
			msg += "\t" + "statusText: [" + ajax.statusText + "]\n";
			log(msg);
		}
	});
}


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function AJAXLoadPage($url, $id, $method, $data, $callback) {
	if (!document.getElementById($id)) {
		log("AJAXLoad: ERROR\nCannot find element id [" + $id + "]");
		return;
	}

	if (!$method) {
		$method = "";
	}

	switch ($method.toLowerCase()) {
		case "post":
			var ajax = $.ajax({
				type: "POST",
				url: $url,
				data: $data,
				success: function (data) {
					$("#" + $id).html(data);
					$callback();
				},
				error: function (data) {
					var msg = "";
					msg += "AJAXLoad: ERROR\n";
					msg += "\t" + "URL: [" + $url + "]\n";
					msg += "\t" + "ID: [" + $id + "]\n";
					msg += "\t" + "method: [" + $method + "]\n";
					msg += "\t" + "data: [" + $data + "]\n";
					msg += "\t" + "status: [" + ajax.status + "]\n";
					msg += "\t" + "statusText: [" + ajax.statusText + "]\n";
					log(msg);
				},
				dataType: "text"
			});
			break;

		case "get":
			var ajax = $.ajax({
				type: "GET",
				url: $url,
				data: $data,
				success: function (data) {
					$("#" + $id).html(data);
					$callback();
				},
				error: function (data) {
					var msg = "";
					msg += "AJAXLoad: ERROR\n";
					msg += "\t" + "URL: [" + $url + "]\n";
					msg += "\t" + "ID: [" + $id + "]\n";
					msg += "\t" + "method: [" + $method + "]\n";
					msg += "\t" + "data: [" + $data + "]\n";
					msg += "\t" + "status: [" + ajax.status + "]\n";
					msg += "\t" + "statusText: [" + ajax.statusText + "]\n";
					log(msg);
				},
				dataType: "text"
			});
			break;

		default:
			$("#" + $id).load($url, function (response, status, xhr) {
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					alert(msg + xhr.status + " " + xhr.statusText);
				} else {
					$callback();
				}
			});
			break;
	}
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -

// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function AJAXLoad($url, $method, $data, $callback) {

	$.ajax({
		method: $method,
		url: $url,
		data: $data,
		success: function (response) {
			$callback(response);
			//return response;
		},
		error: function (jqXHR, textStatus) {
			var msg = "";
			msg += "AFTC.JS: AJAXLoad(): ERROR\n";
			msg += "\t" + "URL: [" + $url + "]\n";
			msg += "\t" + "method: [" + $method + "]\n";
			msg += "\t" + "data: [" + $data + "]\n";
			msg += "\t" + "status: [" + ajax.status + "]\n";
			msg += "\t" + "statusText: [" + ajax.statusText + "]\n";
			msg += "\t" + "jqXHR: [" + jqXHR + "]\n";
			msg += "\t" + "textStatus: [" + textStatus + "]\n";
			log(msg);
		}
	});
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function convertOnlyZeroToNull($input) {
	if ($input == 0) {
		return null;
	}

	if ($input == "0") {
		return null;
	}

	return $intput;
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function convertNullToZero($input) {
	if ($input == null) {
		return 0;
	}

	if ($input == "null") {
		return 0;
	}

	if ($input == "NULL") {
		return 0;
	}
	
	return $input;
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function setCookie($name, $value) {
	//document.cookie = $name + "=" + $value + "; expires=Thu, 18 Dec 2013 12:00:00 GMT";
	//$.cookie($name, $value, {expires:365,path:'/sfsow'});
	var expires = new Date();
	expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
	document.cookie = $name + '=' + $value + ';expires=' + expires.toUTCString();
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function getCookie($name) {
	//return $.cookie($name);
	var keyValue = document.cookie.match('(^|;) ?' + $name + '=([^;]*)(;|$)');
	return keyValue ? keyValue[2] : null;
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function getFileExtensions($input) {
	return $input.slice(($input.lastIndexOf(".") - 1 >>> 0) + 2);
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function getLastPartOfUrl() {
	var $url = window.location.href;
	var $part = $url.substring($url.lastIndexOf('/') + 1);
	return $part;
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
function DebugPosition($arg) {
	
	var $msg = "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
	$msg += "DebugPosition(): " + $arg.selector + " " + $arg[0] + "\n";
	$msg += "\t" + "KEYS: a:left   b:right   w:up,   s:down   k+:scale+   k-:scale-   +:step+   -:step-";
	console.log($msg);
	
	
	$element = $arg;
	$x = 0;
	$y = 0;
	$z = 0;
	$o = 0;
	$sc = 0;
	$tweenTime = 0;
	
	$shift = false;
	$step = 1.01;
	
	
	logPos();
	
	
	$(document).keyup(function (e) {
		switch (e.which) {
			case 16: // shift
				$shift = false;
				break;
		}
	});
	
	$(document).keydown(function (e) {
		//console.log(e.which);
		$x = parseInt($element.css("left"));
		$y = parseInt($element.css("top"));
		$z = parseFloat($element.css("zoom"));
		$o = parseInt($element.css("opacity"));
		$sc = getElementScale();
		
		switch (e.which) {
			case 16: // shift
				$shift = true;
				break;
			
			case 187: // +
				$step += 1;
				logPos();
				break;
			
			case 189: // -
				$step -= 1;
				if ($step < 1) {
					$step = 1;
				}
				logPos();
				break;
			
			
			case 107: // keypad +
				/*
				 $z += 0.001;
				 $z *= 10000; $z = Math.round($z) / 10000;
				 TweenLite.to($element,$tweenTime,{zoom:$z,onComplete:logPos});
				 */
				$sc += 0.001;
				TweenLite.to($element, $tweenTime, {scale: $sc, onComplete: logPos});
				break;
			
			case 109: // keypad -
				/*
				 $z -= 0.001;
				 $z *= 10000; $z = Math.round($z) / 10000;
				 TweenLite.to($element,$tweenTime,{zoom:$z,onComplete:logPos});
				 */
				$sc -= 0.001;
				TweenLite.to($element, $tweenTime, {scale: $sc, onComplete: logPos});
				break;
			
			case 65: // a
				$x -= $step;
				$x *= 100;
				$x = Math.round($x) / 100;
				//TweenLite.to($element,$tweenTime,{left:$x,onComplete:logPos});
				$element.css("left", $x);
				break;
			
			case 68: // d
				$x += $step;
				$x *= 100;
				$x = Math.round($x) / 100;
				//TweenLite.to($element,$tweenTime,{left:$x,onComplete:logPos});
				$element.css("left", $x);
				break;
			
			case 87: // w
				$y -= $step;
				$y *= 100;
				$y = Math.round($y) / 100;
				//TweenLite.to($element,$tweenTime,{top:$y,onComplete:logPos});
				$element.css("top", $y);
				break;
			
			case 83: // s
				$y += $step;
				$y *= 100;
				$y = Math.round($y) / 100;
				//TweenLite.to($element,$tweenTime,{top:$y,onComplete:logPos});
				$element.css("top", $y);
				break;
		}
		
		logPos();
	});
	
	
	function getElementScale() {
		// We will work with 1st value only
		str = $element.css('-webkit-transform');
		str = str.replace("matrix3d(", "");
		str = str.replace("matrix(", "");
		str = str.replace(")", "");
		str = str.replace(" ", "");
		v = str.split(",");
		//console.log(v);
		return parseFloat(v[0]);
	}
	
	/*
	 function getRotationX()
	 {
	 var wkcm = new WebKitCSSMatrix( $element.css('-webkit-transform') );
	 return Math.floor( (Math.asin(wkcm.b) * (180/Math.PI)) );
	 }
	 */
	
	function logPos() {
		$msg = "";
		//$msg += "keycode:" + e.which + "   ";
		$msg += "step:" + Math.round($step) + "   ";
		$msg += "left:" + parseInt($element.css("left")) + "   ";
		$msg += "top:" + Math.round($y) + "   ";
		$msg += "opacity:" + $o.toFixed(3) + "   ";
		$msg += "zoom:" + $z.toFixed(3) + "   ";
		$msg += "scale:" + getElementScale().toFixed(3) + "   ";
		$msg += "w:" + parseFloat($element[0].getBoundingClientRect().width).toFixed(3) + "   ";
		$msg += "h:" + parseFloat($element[0].getBoundingClientRect().height).toFixed(3) + "   ";
		
		console.log($msg);
		//console.log($element.css('-webkit-transform'));
		$("#debug").html($msg);
	}
}
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -


// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
jQuery(document).ready(function () {
	

});
// -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -