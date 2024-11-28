<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form method="POST" action="edit.php?id=<?php echo $user['id']; ?>">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali ke Daftar</a>
</body>
</html>
