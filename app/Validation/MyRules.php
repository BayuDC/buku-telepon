<?php

namespace App\Validation;

use \libphonenumber\PhoneNumberUtil;

class MyRules {
	public function valid_phone_number($phone): bool {
		$phoneUtil = PhoneNumberUtil::getInstance();
		$phone = preg_replace('/\s+/', '', $phone);
		if (preg_match('/^\+?\d+$/', $phone)) {
			$phoneProto = $phoneUtil->parse($phone, 'ID');
			if ($phoneUtil->isPossibleNumber($phoneProto)) {
				return true;
			}
		}
		return false;
	}
}
