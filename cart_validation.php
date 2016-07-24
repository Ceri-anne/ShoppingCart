<?php

namespace Cart\Validation;

function postcode_valid($postcode) {
	return preg_match('/\w{2,3} \d\w{2}/', $postcode);
}

//more accurate
//[A-Z]{1,2}[0-9]{1,2}[A-Z]? [0-9][A-Z]{2}
