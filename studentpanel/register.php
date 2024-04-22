<?php
include("conn.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $section = $_POST["section"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate and sanitize the data (you should add more validation)
    $fullname = htmlspecialchars($fullname);
    $gender = htmlspecialchars($gender);
    $birthdate = htmlspecialchars($birthdate);
    $section = htmlspecialchars($section);
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    // Perform the database connection

    $conn = mysqli_connect("localhost", "root", "", "onlineentranceexam");

    // Check if the student number already exists
    $checkQuery = "SELECT * FROM examinee_tbl WHERE exmne_fullname = '$fullname'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Student number already exists, display a pop-up box
        echo "<script>
                alert('Student with this name already registered.');
                window.location.href = 'index.html'; // Redirect to homepage
              </script>";
    } else {
        // Student number does not exist, proceed with the insertion
        $insert = "INSERT INTO examinee_tbl (exmne_fullname, exmne_gender, exmne_birthdate, exmne_year_level, exmne_email, exmne_password ) VALUES ('$fullname', '$gender', '$birthdate', '$section', '$username', '$password')";

        if (mysqli_query($conn, $insert)) {
            // Redirect back to index.php
             echo "<script>
                alert('you successfully registered, please log in.');
              </script>";
              header("Location: student/index.php");
        } else {
            echo "Error inserting values: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>