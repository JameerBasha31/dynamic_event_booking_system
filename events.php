<?php
require_once '../database/db.php';

function createEvent($title, $description, $date, $venue, $available_seats) {
    $conn = connectDB();
    $sql = "INSERT INTO events (title, description, date, venue, available_seats) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $description, $date, $venue, $available_seats);
    return mysqli_stmt_execute($stmt);
}

function editEvent($id, $title, $description, $date, $venue, $available_seats) {
    $conn = connectDB();
    $sql = "UPDATE events SET title = ?, description = ?, date = ?, venue = ?, available_seats = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssii", $title, $description, $date, $venue, $available_seats, $id);
    return mysqli_stmt_execute($stmt);
}

function deleteEvent($id) {
    $conn = connectDB();
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

function getEvents() {
    $conn = connectDB();
    $sql = "SELECT * FROM events";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getEventById($id) {
    $conn = connectDB();
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}
?>