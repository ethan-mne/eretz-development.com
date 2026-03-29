<?php
declare(strict_types=1);

/**
 * Contact form endpoint for index.html (POST from vlt-contact-form).
 * Set CONTACT_EMAIL in the server environment to override the default recipient.
 */

header('Content-Type: text/plain; charset=utf-8');

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
	http_response_code(405);
	exit('Method Not Allowed');
}

// Honeypot — if filled, pretend success (bots).
if (!empty($_POST['website'] ?? null)) {
	http_response_code(200);
	exit('OK');
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$company = trim((string) ($_POST['company'] ?? ''));
$topic = trim((string) ($_POST['topic'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($name === '' || mb_strlen($name) > 200) {
	http_response_code(400);
	exit('Invalid name');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 254) {
	http_response_code(400);
	exit('Invalid email');
}
if ($message === '' || mb_strlen($message) > 10000) {
	http_response_code(400);
	exit('Invalid message');
}
if (mb_strlen($company) > 200) {
	http_response_code(400);
	exit('Invalid company');
}

$allowedTopics = [
	'hosting',
	'private-cloud',
	'development',
	'ai',
	'usage',
	'other',
];
if ($topic !== '' && !in_array($topic, $allowedTopics, true)) {
	http_response_code(400);
	exit('Invalid topic');
}

$topicLabels = [
	'hosting' => 'Hosting & infrastructure',
	'private-cloud' => 'Private cloud & ops',
	'development' => 'Software development',
	'ai' => 'AI & private cloud',
	'usage' => 'Usage-based pricing',
	'other' => 'Other',
];

$to = getenv('CONTACT_EMAIL') ?: 'contact@eretz-development.com';
$subject = '[Website] Contact from ' . $name;

$body = "Name: {$name}\r\n";
$body .= "Email: {$email}\r\n";
if ($company !== '') {
	$body .= "Company: {$company}\r\n";
}
if ($topic !== '') {
	$label = $topicLabels[$topic] ?? $topic;
	$body .= "Topic: {$label}\r\n";
}
$body .= "\r\nMessage:\r\n{$message}\r\n";

$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$host = preg_replace('/[^a-zA-Z0-9.-]/', '', $host);
if ($host === '') {
	$host = 'localhost';
}

$fromLocal = 'no-reply@' . $host;
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= 'From: Eretz Website <' . $fromLocal . ">\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . PHP_VERSION . "\r\n";

$sent = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);
if (!$sent) {
	http_response_code(500);
	exit('Send failed');
}

http_response_code(200);
exit('OK');
