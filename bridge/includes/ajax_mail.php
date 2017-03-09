<?php
require_once('recaptchalib.php');
require('../../../../wp-blog-header.php');
global $qode_options_proya;

$publickey = $qode_options_proya['recaptcha_public_key'];
$privatekey = $qode_options_proya['recaptcha_private_key'];

if ($publickey == "") $publickey = "6Ld5VOASAAAAABUGCt9ZaNuw3IF-BjUFLujP6C8L";
if ($privatekey == "") $privatekey = "6Ld5VOASAAAAAKQdKVcxZ321VM6lkhBsoT6lXe9Z";

$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

$use_captcha = $qode_options_proya['use_recaptcha'];
if ($resp->is_valid || $use_captcha == "no") {
	?>success<?php

	$email_to = $qode_options_proya['receive_mail'];
	$email_from = $qode_options_proya['email_from'];
	$subject = $qode_options_proya['email_subject'];

	$first_name = qode_replace_newline($_POST["name"]);
	$last_name	= qode_replace_newline($_POST["lastname"]);
	$website	= $_POST["website"];
	$message	= $_POST["message"];

	$text = "Name: " . $first_name . " " . $last_name . "\n";
	$text .= "Email: " . $_POST["email"] . "\n";
	$text .= "WebSite: " . $website . "\n";
	$text .= "Message: " . $message;

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/plain; charset=utf-8" . "\r\n";
	$headers .= "From: '".$first_name." ".$last_name."' <".$email_from."> " . "\r\n";

	$result = wp_mail($email_to, $subject, $text, $headers);

	if(!$result) {
		global $phpmailer;
		var_dump($phpmailer->ErrorInfo);
	}
}
else {
	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .  "(reCAPTCHA said: " . $resp->error . ")");
}
?>