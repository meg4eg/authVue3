<?php

class User
{
	private static function user_fetch_by_email($email) {
		$q = DB::query("SELECT id FROM users WHERE email='".$email."'") or die (DB::error());
		return DB::fetch_row($q);
	}
	public static function addUser($d = []) {
		// vars
		$first_name = isset($d['first_name']) && trim($d['first_name']) ? trim($d['first_name']) : '';
		$last_name = isset($d['last_name']) && trim($d['last_name']) ? trim($d['last_name']) : '';
		$email = isset($d['email']) && trim($d['email']) ? strtolower(trim($d['email'])) : '';
		// update
		 DB::query("INSERT INTO users (
                first_name,
                last_name,
                email
            ) VALUES (
                '".$first_name."',
                '".$last_name."',
                '".$email."'
            );") or die (DB::error());

		// output
		return User::user_fetch_by_email($email);
	}

}
