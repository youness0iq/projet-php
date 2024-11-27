<html>
<body>

<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    // Display welcome message with form data
    echo '<p> Hi '. $_SESSION['email']. '
    ' .$_SESSION['password']. ' you are in page 1 </p>';
} else {
    echo "No form data received.";
}
?>

</body>
</html>