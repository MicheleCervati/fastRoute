<?php
session_start();
@include_once 'templates/header.php';
@include 'config/database.php';

// Verifica se l'utente è loggato
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    $id_sede = $_POST['id_sede'];
    $data_ora = date('Y-m-d H:i:s');

    if (!empty($id_cliente) && !empty($id_sede)) {
        $stmt = $conn->prepare("INSERT INTO consegna (id_cliente, id_sede, data_ora) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_cliente, $id_sede, $data_ora);

        if ($stmt->execute()) {
            $success = "Consegna registrata con successo!";
        } else {
            $error = "Errore durante la registrazione della consegna.";
        }

        $stmt->close();
    } else {
        $error = "Tutti i campi sono obbligatori.";
    }
}
?>

<main class="container mt-5">
    <h2>Inserisci Consegna</h2>

    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <?php if (!empty($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
        </div>
        <div class="mb-3">
            <label for="id_sede" class="form-label">Sede</label>
            <input type="number" class="form-control" id="id_sede" name="id_sede" required>
        </div>
        <button type="submit" class="btn btn-primary">Registra Consegna</button>
    </form>
</main>

<?php @include_once 'templates/footer.php'; ?>
