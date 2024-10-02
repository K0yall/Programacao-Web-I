<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de um Retângulo</title>
</head>
<body>
    <h1>Calcular a Área de um Retângulo</h1>
    <form method="POST">
        <label for="lado_a">Digite o comprimento do lado A (em metros):</label>
        <input type="number" id="lado_a" name="lado_a" required><br><br>

        <label for="lado_b">Digite o comprimento do lado B (em metros):</label>
        <input type="number" id="lado_b" name="lado_b" required><br><br>
        
        <input type="submit" value="Calcular Área">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lado_a = $_POST["lado_a"];
        $lado_b = $_POST["lado_b"];
        $area = $lado_a * $lado_b;

        if ($area > 10) {
            echo "<h1>A área do retângulo de lados $lado_a e $lado_b metros é $area metros quadrados.</h1>";
        } else {
            echo "<h3>A área do retângulo de lados $lado_a e $lado_b metros é $area metros quadrados.</h3>";
        }
    }
    ?>
</body>
</html>
