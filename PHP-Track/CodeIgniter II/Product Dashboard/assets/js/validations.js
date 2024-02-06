function hasPresence($obj) {
	return $obj.val() !== "" && $obj.val() !== null;
}

function validateEmail($obj) {
	var regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return regEx.test($obj.val());
}

function meetsLengthRequirements($obj, minLength) {
  	return $obj.val().length > minLength;
}

function passwordsMatch() {
	return $('#confirm_password').val() == $('#password').val();
}

function swapClass($obj, beforeClass, afterClass) {
	$obj.removeClass(beforeClass);
	$obj.addClass(afterClass);
}

function fail($obj) {
  	swapClass($obj, 'success', 'fail');
}

function success($obj) {
  	swapClass($obj, 'fail', 'success');
}

$(document).ready(function() {
	/*
	DOCU: This event is called everytime the user is typing.
	This checks if the email , firstname , lastname , password and confirm password
	is not empty.
	Change input background to green if not empty. Red otherwise.

	Owner: Wendell
	*/
	$('#email_address , #first_name , #last_name , #password').keyup(function(){
		hasPresence($(this)) ? success($(this)) : fail($(this));
	});

	/*
	DOCU: This event is called everytime the user is typing.
	This checks if the email is valid or not.
	Change input background to green for valid email. Red otherwise.

	Owner: Wendell
	*/
	$('#email_address').keyup(function(){
		validateEmail($(this)) ? success($(this)) : fail($(this));
	});

	/*
	DOCU: This event is called everytime the user is typing.
	This checks if the password length is greater than 7.
	Change input background to green if greater than 7. Red otherwise.

	Owner: Wendell
	*/
	$('#password').keyup(function(){
		meetsLengthRequirements($(this), 7) ? success($(this)) : fail($(this));
	});

	/*
	DOCU: This event is called everytime the user is typing.
	This checks if the passwords are a match.
	Change input background to green if match. Red otherwise.

	Owner: Wendell
	*/
	$('#confirm_password').keyup(function(){
		passwordsMatch() ? success($(this)) : fail($(this));
	});
});
