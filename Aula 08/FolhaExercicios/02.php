<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisibilidade por 2</title>
</head>
<body>
    <h1>Verificar Divisibilidade por 2</h1>
    <form method="POST">
        <label for="valor">Digite um número:</label>
        <input type="number" id="valor" name="valor" required><br><br>
        
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = $_POST["valor"];

        if ($valor % 2 == 0) {
            echo "<p>Valor divisível por 2</p>";
        } else {
            echo "<p>O valor não é divisível por 2</p>";
        }
    }
    ?>
</body>
</html>
