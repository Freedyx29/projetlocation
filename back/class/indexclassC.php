<?php
session_start();
include("../include/connexion_PDO.php");
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = session_id();
}
$uid = $_SESSION['user'];  // set your user id settings
$datetime_string = date('c', time());

if (isset($_POST['action']) or isset($_GET['view'])) {
    try {
        $pdo = new PDO($dns, $user, $mdp);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['view'])) {
            header('Content-Type: application/json');
            $start = $_GET["start"];
            $end = $_GET["end"];

            $stmt = $pdo->prepare("SELECT `id`, `start` ,`end` ,`title` FROM  `events` WHERE (DATE(start) >= ? AND DATE(start) <= ?) AND uid = ?");
            $stmt->execute([$start, $end, $uid]);
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($events);
            exit;
        } elseif ($_POST['action'] == "add") {
            $title = $_POST["title"];
            $start = date('Y-m-d H:i:s', strtotime($_POST["start"]));
            $end = date('Y-m-d H:i:s', strtotime($_POST["end"]));

            $stmt = $pdo->prepare("INSERT INTO `events` (`title`, `start`, `end`, `uid`) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $start, $end, $uid]);

            header('Content-Type: application/json');
            echo '{"id":"' . $pdo->lastInsertId() . '"}';
            exit;
        } elseif ($_POST['action'] == "update") {
            $start = date('Y-m-d H:i:s', strtotime($_POST["start"]));
            $end = date('Y-m-d H:i:s', strtotime($_POST["end"]));
            $id = $_POST["id"];

            $stmt = $pdo->prepare("UPDATE `events` SET `start` = ?, `end` = ? WHERE uid = ? AND id = ?");
            $stmt->execute([$start, $end, $uid, $id]);

            exit;
        } elseif ($_POST['action'] == "delete") {
            $id = $_POST["id"];

            $stmt = $pdo->prepare("DELETE FROM `events` WHERE uid = ? AND id = ?");
            $stmt->execute([$uid, $id]);

            if ($stmt->rowCount() > 0) {
                echo "1";
            }
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>