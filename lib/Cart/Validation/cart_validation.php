<?php

namespace Cart\Validation;

function postcode_valid($postcode) {
	return preg_match('/\w{2,3} \d\w{2}/', $postcode);
}
