<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cifrado{

	function supercifrar($string){
		$output = false;

		$myKey = 'oW%c76+jb2';
		$myIV = 'A)2!u467a^';
		$encrypt_method = 'AES-256-CBC';

		$secret_key = hash('sha256', $myKey);
		$secret_iv = substr(hash('sha256', $myIV), 0, 16);

		$string = trim(strval($string));

		$output = openssl_encrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);

		return $output;
	}

	function superdescifrar($string){
		$output = false;

		$myKey = 'oW%c76+jb2';
		$myIV = 'A)2!u467a^';
		$encrypt_method = 'AES-256-CBC';

		$secret_key = hash('sha256', $myKey);
		$secret_iv = substr(hash('sha256', $myIV), 0, 16);

		$string = trim(strval($string));

		$output = openssl_decrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);

		return $output;
	}
}
