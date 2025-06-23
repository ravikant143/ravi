<?php
require_once 'functions.php';

// Verification logic
$verification_result = null;
if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];
    if (verifySubscription($email, $code)) {
        $verification_result = [
            'success' => true,
            'message' => 'Your subscription has been verified successfully!'
        ];
    } else {
        $verification_result = [
            'success' => false,
            'message' => 'Verification failed. The link may be invalid or expired.'
        ];
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $verification_result = [
        'success' => false,
        'message' => 'Missing verification parameters.'
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Implement Header ! -->
</head>
<body>
	<!-- Do not modify the ID of the heading -->
	<h2 id="verification-heading">Subscription Verification</h2>
    <?php if ($verification_result): ?>
        <p style="color: <?= $verification_result['success'] ? 'green' : 'red' ?>;">
            <?= htmlspecialchars($verification_result['message']) ?>
        </p>
    <?php endif; ?>
	<!-- Implemention body -->
</body>
</html>