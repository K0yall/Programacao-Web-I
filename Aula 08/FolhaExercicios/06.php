<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras de Joãozinho</title>
    <style>
        .blue { color: blue; }
        .red { color: red; }
        .green { color: green; }
    </style>
</head>
<body>
    <h1>Compras de Joãozinho</h1>
    <form method="POST">
        <label for="maca">Maçã (Kg):</label>
        <input type="number" id="maca" name="maca" step="0.01" required><br><br>

        <label for="melancia">Melancia (Kg):</label>
        <input type="number" id="melancia" name="melancia" step="0.01" required><br><br>

        <label for="laranja">Laranja (Kg):</label>
        <input type="number" id="laranja" name="laranja" step="0.01" required><br><br>

        <label for="repolho">Repolho (Kg):</label>
        <input type="number" id="repolho" name="repolho" step="0.01" required><br><br>

        <label for="cenoura">Cenoura (Kg):</label>
        <input type="number" id="cenoura" name="cenoura" step="0.01" required><br><br>

        <label for="batatinha">Batatinha (Kg):</label>
        <input type="number" id="batatinha" name="batatinha" step="0.01" required><br><br>

        <input type="submit" value="Calcular Total">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $preco_por_kg = [
            'maca' => 3.50,
            'melancia' => 1.80,
            'laranja' => 2.20,
            'repolho' => 1.50,
            'cenoura' => 2.80,
            'batatinha' => 3.00
        ];

        $quantidades = [
            'maca' => $_POST['maca'],
            'melancia' => $_POST['melancia'],
            'laranja' => $_POST['laranja'],
            'repolho' => $_POST['repolho'],
            'cenoura' => $_POST['cenoura'],
            'batatinha' => $_POST['batatinha']
        ];

        $total = 0;
        foreach ($quantidades as $produto => $quantidade) {
            $total += $preco_por_kg[$produto] * $quantidade;
        }

        $dinheiro_disponivel = 50.00;

        if ($total > $dinheiro_disponivel) {
            $diferenca = $total - $dinheiro_disponivel;
            echo "<p class='red'>Joãozinho gastou R$ $total. Ele ultrapassou em R$ $diferenca.</p>";
        } elseif ($total == $dinheiro_disponivel) {
            echo "<p class='green'>Joãozinho gastou exatamente R$ $total. O saldo para compras foi esgotado.</p>";
        } else {
            $restante = $dinheiro_disponivel - $total;
            echo "<p class='blue'>Joãozinho gastou R$ $total. Ele ainda pode gastar R$ $restante.</p>";
        }
    }
    ?>
</body>
</html>
