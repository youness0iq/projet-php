<?php

include("database.php");

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialisation des variables
session_start();
$emailerrormsg = "";
$passworderrormsg = "";
$emailvalue = "";
$passwordvalue = "";

if (isset($_POST["submit"])) {
  
    // Récupération des valeurs du formulaire
    $emailvalue = isset($_POST["emailvalue"]) ? $_POST["emailvalue"] : "";
    $passwordvalue = isset($_POST["passwordvalue"]) ? $_POST["passwordvalue"] :"" ;
    $namevalue = $_POST["nomuser"];
    $prevalue = $_POST["prenomuser"];
    $rolevalue = $_POST["role"];
    // Validation des champs
    if ($emailvalue == "") {
        $emailerrormsg = "Email must be filled out";
    } elseif (!preg_match("/\w+(@emsi\.ma){1}$/", $emailvalue)) {
        $emailerrormsg = "Please enter a valid email with '@emsi.ma'";
    } elseif ($passwordvalue == "") {
        $passworderrormsg = "Password must be filled out";
    } else {
        // Hachage du mot de passe
        $hashedpassword = password_hash($passwordvalue, PASSWORD_DEFAULT);

        // Préparer la requête SQL
        $sql = "INSERT INTO Clients (email, password, nom ,prenom ,role) VALUES ('$emailvalue', '$hashedpassword','$namevalue' ,'$prevalue' ,'$rolevalue' )";

        // Exécuter la requête
        if (mysqli_query($conn, $sql) && $rolevalue == "0") {
            echo "Insertion successful.";
            header("Location: admin.php");
            exit();}
        else if(mysqli_query($conn, $sql)){

            echo "Insertion successful.";
            header("Location: page1.php");

        }
        else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <h1>Sign Up</h1>
                    <fieldset>
                        <legend><span class="number">1</span> Your Basic Info</legend>
                        
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="emailvalue" value="<?php echo $emailvalue; ?>">
                        <span><?php echo $emailerrormsg; ?></span>
                        
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="passwordvalue">
                        <span><?php echo $passworderrormsg; ?></span>

                        <label for="name">Nom:</label>
                        <input type="text" id="nomuser" name="nomuser">
                        <span><?php echo $passworderrormsg; ?></span>

                        <label for="prenom">Prénom:</label>
                        <input type="text"  name="prenomuser">
                        <span><?php echo $passworderrormsg; ?></span>

                        <label for="password">role:</label>
                        
                        <select name="role" id="rolee">
                            <option value="0">Admin</option>
                            <option value="1">Encadrant</option>
                            <option value="2">etudiant</option>
                            
                        </select>


                        <span><?php echo $passworderrormsg; ?></span>




                    </fieldset>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </body>
</html>
