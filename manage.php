<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <?php include 'includes/css.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <div class="content-wrapper">
            <div class="container mt-4">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">nom</th>
                            <th scope="col">prenom</th>
                            <th scope="col">role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("database.php"); // Inclure le fichier de connexion

                        // Vérifier la connexion à la base de données
                        if (!$conn) {
                            die("Database connection failed: " . mysqli_connect_error());
                        }

                        // Exécuter la requête
                        $sql = "SELECT id, email, nom, prenom FROM clients";
                        $result = mysqli_query($conn, $sql);

                        // Vérifier si la requête a réussi
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                // Parcourir les résultats et les afficher
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($row['id']) . "</td>
                                            <td>" . htmlspecialchars($row['email']) . "</td>
                                            <td>" . htmlspecialchars($row['nom']) . "</td>
                                            <td>" . htmlspecialchars($row['prenom']) . "</td>
                                            <td>
                                                <a class='btn btn-success btn-sm' href='update.php?idUpdated=" . htmlspecialchars($row['id']) . "'>Edit</a>
                                                <a class='btn btn-danger btn-sm' href='delete.php?idDeleted=" . htmlspecialchars($row['id']) . "'>Delete</a>
                                            </td>
                                         </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No users found</td></tr>";
                            }
                        } else {
                            // Afficher l'erreur en cas d'échec de la requête
                            echo "<tr><td colspan='5'>Query failed: " . mysqli_error($conn) . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include 'includes/js.php'; ?>
    </div>
</body>
</html>
