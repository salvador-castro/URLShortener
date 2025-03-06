<?php
require 'config.php';
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url_larga = filter_var($_POST['url'], FILTER_VALIDATE_URL);
    if ($url_larga) {
        $codigo = generarCodigo();
        
        // Verificar si el código ya existe
        $stmt = $pdo->prepare("SELECT * FROM urls WHERE codigo = :codigo");
        $stmt->bindParam(":codigo", $codigo);
        $stmt->execute();
        while ($stmt->rowCount() > 0) {
            $codigo = generarCodigo();
            $stmt->execute();
        }
        
        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO urls (codigo, url_larga) VALUES (:codigo, :url_larga)");
        $stmt->bindParam(":codigo", $codigo);
        $stmt->bindParam(":url_larga", $url_larga);
        $stmt->execute();
        
        echo "URL acortada: <a href='http://localhost/url_shortener/$codigo' target='_blank'>http://localhost/url_shortener/$codigo</a>";
    } else {
        echo "URL inválida.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Acortador de URLs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Acortador de URLs</h2>
    <form method="post">
        <input type="text" name="url" class="form-control" placeholder="Ingrese la URL" required>
        <button type="submit" class="btn btn-primary mt-2">Acortar</button>
    </form>
</body>
</html>