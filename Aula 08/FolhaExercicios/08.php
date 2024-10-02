<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiamento Paulinho - Moto</title>
</head>
<body>
    <h1>Cálculo do Financiamento da Moto</h1>
    <form method="POST">
        <label for="bike_value">Valor da moto (R$):</label>
        <input type="number" id="bike_value" name="bike_value" value="8654" readonly><br><br>

        <label for="installments">Escolha o número de parcelas:</label>
        <select id="installments" name="installments">
            <option value="24">24 vezes</option>
            <option value="36">36 vezes</option>
            <option value="48">48 vezes</option>
            <option value="60">60 vezes</option>
        </select><br><br>

        <button type="submit">Calcular Parcelas</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bike_value = 8654; // Valor da moto
        $installments = $_POST["installments"]; // Número de parcelas

        // Calculando a taxa de juros
        $initial_interest_rate = 1.5; // Taxa inicial de juros em %
        $interest_rate = $initial_interest_rate + (0.5 * (($installments / 12) - 2)); // Taxa para o número de parcelas

        // Calculando o valor da parcela
        $total_interest = ($bike_value * $interest_rate / 100) * ($installments / 12); // Juros totais
        $total_paid = $bike_value + $total_interest; // Valor total pago
        $installment_value = $total_paid / $installments; // Valor da parcela

        // Exibindo os resultados
        echo "<h2>Resultados</h2>";
        echo "Valor da moto: R$ " . number_format($bike_value, 2, ',', '.') . "<br>";
        echo "Taxa de juros: " . number_format($interest_rate, 2, ',', '.') . "%<br>";
        echo "Valor total pago: R$ " . number_format($total_paid, 2, ',', '.') . "<br>";
        echo "Valor da parcela: R$ " . number_format($installment_value, 2, ',', '.');
    }
    ?>
</body>
</html>
