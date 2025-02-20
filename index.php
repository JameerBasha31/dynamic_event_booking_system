<?php
session_start();
require_once 'database/db.php';
require_once 'includes/auth.php';
require_once 'includes/events.php';

$events = getEvents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <h1>Welcome to the Event Booking System</h1>

    <div class="events">
        <h2>Available Events</h2>
        <?php if (count($events) > 0): ?>
            <ul>
                <?php foreach ($events as $event): ?>
                    <li>
                        <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                        <p><?php echo htmlspecialchars($event['description']); ?></p>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
                        <p><strong>Venue:</strong> <?php echo htmlspecialchars($event['venue']); ?></p>
                        <p><strong>Available Seats:</strong> <?php echo htmlspecialchars($event['available_seats']); ?></p>
                        <?php if ($event['available_seats'] > 0): ?>
                            <button class="register-event" data-event-id="<?php echo $event['id']; ?>">Register</button>
                        <?php else: ?>
                            <p class="sold-out">Sold Out</p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No events available.</p>
        <?php endif; ?>
    </div>

    <script src="assets/js/event.js"></script>
</body>
</html>