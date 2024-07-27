<?php
session_start();
$target_dir = "../assets/img/gallery/";
$target_file = $target_dir . basename($_FILES["galleryImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["galleryImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['error_message'] = "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['error_message'] = "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["galleryImage"]["size"] > 500000) {
    $_SESSION['error_message'] = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("Location: ../../admin/dashboard.php");
} else {
    if (move_uploaded_file($_FILES["galleryImage"]["tmp_name"], $target_file)) {
        // Insert into database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gallery_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $image_path = "assets/img/gallery/" . basename($_FILES["galleryImage"]["name"]);

        $sql = "INSERT INTO gallery_images (image_path) VALUES ('$image_path')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "The file " . htmlspecialchars(basename($_FILES["galleryImage"]["name"])) . " has been uploaded.";
        } else {
            $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: ../../admin/dashboard.php");
    } else {
        $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        header("Location: ../../admin/dashboard.php");
    }
}
?>
