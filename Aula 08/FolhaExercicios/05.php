<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de um Triângulo Retângulo</title>
</head>
<body>
    <h1>Calcular a Área de um Triângulo Retângulo</h1>
    <form method="POST">
        <label for="base">Digite a base do triângulo (em metros):</label>
        <input type="number" id="base" name="base" required><br><br>

        <label for="altura">Digite a altura do triângulo (em metros):</label>
        <input type="number" id="altura" name="altura" required><br><br>
        
        <input type="submit" value="Calcular Área">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST["base"];
        $altura = $_POST["altura"];
        $area = ($base * $altura) / 2;

        echo "<p>A área do triângulo retângulo com base $base metros e altura $altura metros é $area metros quadrados.</p>";
    }
    ?>
</body>
</html>
