<?php
function generarCodigo($longitud = 6) {
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $longitud);
}
?>
```

redirect.php:
```php
<?php
require 'config.php';

$codigo = $_GET['codigo'] ?? '';
$stmt = $pdo->prepare("SELECT url_larga FROM urls WHERE codigo = :codigo");
$stmt->bindParam(":codigo", $codigo);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    header("Location: " . $result['url_larga']);
    exit;
} else {
    echo "URL no encontrada.";
}
?>