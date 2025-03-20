<?php
session_start();
@include_once 'templates/header.php';

$config = require_once 'config/databaseConf.php';
require 'config/DBconn.php';

$db = DBconn::getDB($config);

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $stmt = $db->prepare("SELECT id, nome, password FROM personale WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;

            if ($remember) {
                setcookie("email", $email, time() + (86400 * 30), "/");
            }

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password errata.";
        }
    } else {
        $error = "Nessun account trovato con questa email.";
    }
    $stmt->close();
}
?>



    <div class="container w-50">
        <h2 class="text-center">Accedi</h2>
        <?php if ($error) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="remember" class="form-check-input">
                <label class="form-check-label">Ricordami</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

<?php
