<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiamento Mariazinha</title>
</head>
<body>
    <h1>Calcular Juros do Financiamento</h1>
    <form method="POST">
        <label for="car_value">Valor do carro (R$):</label>
        <input type="number" id="car_value" name="car_value" value="22500" readonly><br><br>

        <label for="installments">Número de parcelas:</label>
        <input type="number" id="installments" name="installments" value="60" readonly><br><br>

        <label for="installment_value">Valor de cada parcela (R$):</label>
        <input type="number" id="installment_value" name="installment_value" value="489.65" readonly><br><br>

        <button type="submit">Calcular Juros</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $car_value = 22500;
        $installments = 60;
        $installment_value = 489.65;

        $total_paid = $installments * $installment_value;
        $interest_paid = $total_paid - $car_value;

        echo "<h2>Resultados</h2>";
        echo "Valor total pago: R$ " . number_format($total_paid, 2, ',', '.') . "<br>";
        echo "Juros pagos: R$ " . number_format($interest_paid, 2, ',', '.');
    }
    ?>
</body>
</html>