<?php
include 'koneksi.php';

$nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$role = isset($_POST['role']) ? trim($_POST['role']) : '';

if (empty($nim) || empty($password) || empty($role)) {
    echo "Please fill in all fields.";
    exit;
}

$sql = "SELECT * FROM mahasiswa WHERE nim = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nim);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        if ($row['role'] === $role) {
            echo "success";
        } else {
            echo "Invalid role.";
        }
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid NIM.";
}

$stmt->close();
$conn->close();
?>
