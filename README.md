Extended Laravel 3 validator with labels
=============================

Library that extends the default Laravel validator implementation with CodeIgniter-like passable attribute labels.

Installation
---------------

Dump it into `application/libraries` folder and comment out the default alias for Laravel validator in the `application/config/application.php`

Usage
---------

Manually passing labels, these will take priority over `language/xx/validation` defined ones and the ones generated from the name attribute:
	
	// Defining our rules as usual
	$rules = array(
		'email' => 'required|email',
		'full_name' => 'required'
	);
	
	// Defining our labels for the validator to use
	$attribute_labels = array(
		'email' => 'E-mail address',
		'full_name' => 'Your full name'
	);
	
	// Make the validator as usual and pass some labels
	$validation = Validator::make(Input::all(), $rules)->with_labels($attribute_labels);

Calling `with_labels()` multiple times merges the new labels with the ones already set before and updates in case label keys match.

You can access all defined labels by accessing the `attribute_labels` property on the Validator object:

	$validation = Validator::make(Input::all(), $rules)->with_labels($attribute_labels);
	$all_labels = $validation->attribute_labels;

And if you need to clear the labels you can clear the labels by using the `clear_labels()` method

	$validation = Validator::make(Input::all(), $rules)->with_labels($attribute_labels);

	// For some reason we have changed our mind
	$validation->clear_labels();