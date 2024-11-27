<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin </title>
  <?php include 'includes/css.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include 'includes/navbar.php' ?>
    <div class="content-wrapper">

      <?php
      $arr = array(
        ["title" => "Home", "url" => "./"],
        ["title" => "Dashboard", "url" => "#"],
      );
      pagePath('Dashboard', $arr);
      ?>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Premier "small-box" -->
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php
                    // Inclure la connexion à la base de données
                    include("database.php");

                    function getUserCount($conn) {
                      $sql = "SELECT COUNT(*) as user_count FROM clients";
                      $result = $conn->query($sql);

                      if ($result && $row = $result->fetch_assoc()) {
                        return $row['user_count'];
                      } else {
                        return 0;
                      }
                    }

                    echo getUserCount($conn);
                    ?>
                  </h3>
                  <p>All users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- Deuxième "small-box" -->
<div class="col-lg-3 col-md-6 col-sm-12">
  <div class="small-box bg-success">
    <div class="inner">
      <h3>
        <?php
        // Inclure la connexion à la base de données
        include("database.php");

        // Fonction pour obtenir les utilisateurs avec le rôle 0
        function getUsersWithRoleZero($conn) {
          // Requête SQL pour obtenir les utilisateurs avec le rôle 0
          $sql = "SELECT COUNT(*) as role_zero_count FROM clients WHERE role = 0";
          $result = $conn->query($sql);

          // Vérifier si le résultat est valide et retourner le nombre d'utilisateurs
          if ($result && $row = $result->fetch_assoc()) {
            return $row['role_zero_count'];
          } else {
            return 0; // Retourner 0 si aucun utilisateur n'est trouvé
          }
        }

        // Appeler la fonction et afficher le nombre d'utilisateurs avec le rôle 0
        echo getUsersWithRoleZero($conn);
        ?>
      </h3>
      <p>Admin</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>


            <!-- Troisième "small-box" -->
<div class="col-lg-3 col-md-6 col-sm-12">
  <div class="small-box bg-warning">
    <div class="inner">
      <h3>
        <?php
        // Inclure la connexion à la base de données
        include("database.php");

        // Fonction pour obtenir les utilisateurs avec le rôle 1
        function getUsersWithRoleOne($conn) {
          // Requête SQL pour obtenir les utilisateurs avec le rôle 1
          $sql = "SELECT COUNT(*) as role_one_count FROM clients WHERE role = 1";
          $result = $conn->query($sql);

          // Vérifier si le résultat est valide et retourner le nombre d'utilisateurs
          if ($result && $row = $result->fetch_assoc()) {
            return $row['role_one_count'];
          } else {
            return 0; // Retourner 0 si aucun utilisateur n'est trouvé
          }
        }

        // Appeler la fonction et afficher le nombre d'utilisateurs avec le rôle 1
        echo getUsersWithRoleOne($conn);
        ?>
      </h3>
      <p>Encadrant</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>


            <!-- Quatrième "small-box" -->
<div class="col-lg-3 col-md-6 col-sm-12">
  <div class="small-box bg-danger">
    <div class="inner">
      <h3>
        <?php
        // Inclure la connexion à la base de données
        include("database.php");

        // Fonction pour obtenir les utilisateurs avec le rôle 2
        function getUsersWithRoleTwo($conn) {
          // Requête SQL pour obtenir les utilisateurs avec le rôle 2
          $sql = "SELECT COUNT(*) as role_two_count FROM clients WHERE role = 2";
          $result = $conn->query($sql);

          // Vérifier si le résultat est valide et retourner le nombre d'utilisateurs
          if ($result && $row = $result->fetch_assoc()) {
            return $row['role_two_count'];
          } else {
            return 0; // Retourner 0 si aucun utilisateur n'est trouvé
          }
        }

        // Appeler la fonction et afficher le nombre d'utilisateurs avec le rôle 2
        echo getUsersWithRoleTwo($conn);
        ?>
      </h3>
      <p>Student</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

    <?php include 'includes/footer.php'; ?>
  </div>

  <?php include 'includes/js.php' ?>
</body>

</html>
