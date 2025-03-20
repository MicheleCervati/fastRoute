<?php
@include_once 'templates/header.php';
?>

    <main class="container mt-5 text-center">
        <h1 class="text-primary">Benvenuto su FastRoute</h1>
        <p class="lead">Il tuo corriere espresso di fiducia per spedizioni rapide e sicure.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestione Spedizioni</h5>
                        <p class="card-text">Inserisci e monitora le spedizioni in tempo reale.</p>
                        <a href="spedizioni.php" class="btn btn-primary">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestione Clienti</h5>
                        <p class="card-text">Gestisci i dati dei clienti in modo semplice e veloce.</p>
                        <a href="clienti.php" class="btn btn-primary">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dashboard</h5>
                        <p class="card-text">Visualizza lo stato delle spedizioni e statistiche.</p>
                        <a href="dashboard.php" class="btn btn-primary">Vai</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
@include_once 'templates/footer.php';
?>