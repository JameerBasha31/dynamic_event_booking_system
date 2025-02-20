<?php
require_once '../database/db.php';

function registerForEvent($user_id, $event_id) {
    $conn = connectDB();
    $sql = "SELECT available_seats FROM events WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $event_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $available_seats);
    mysqli_stmt_fetch($stmt);

    if ($available_seats > 0) {
        $sql = "INSERT INTO bookings (user_id, event_id, booking_date) VALUES (?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $event_id);
        mysqli_stmt_execute($stmt);

        $sql = "UPDATE events SET available_seats = available_seats - 1 WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $event_id);
        mysqli_stmt_execute($stmt);

        return true;
    } else {
        return false;
    }
}

function cancelRegistration($user_id, $event_id) {
    $conn = connectDB();
    $sql = "DELETE FROM bookings WHERE user_id = ? AND event_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $event_id);
    mysqli_stmt_execute($stmt);

    $sql = "UPDATE events SET available_seats = available_seats + 1 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $event_id);
    mysqli_stmt_execute($stmt);

    return true;
}

function getBookingsByEvent($event_id) {
    $conn = connectDB();
    $sql = "SELECT * FROM bookings WHERE event_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $event_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>