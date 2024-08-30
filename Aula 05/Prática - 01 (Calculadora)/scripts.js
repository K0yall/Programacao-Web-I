function appendToDisplay(value) {
    const display = document.getElementById('display');
    if (display.innerText === '0') {
        display.innerText = value;
    } else {
        display.innerText += value;
    }
}

function clearDisplay() {
    const display = document.getElementById('display');
    display.innerText = '0';
    display.className = 'display neutral';
}

function calculate() {
    const display = document.getElementById('display');
    let result;
    try {
        result = eval(display.innerText);
        if (isNaN(result) || !isFinite(result)) {
            result = 'Erro';
        } else {
            result = parseFloat(result.toFixed(10)); // Limitar casas decimais
        }
    } catch (e) {
        result = 'Erro';
    }

    display.innerText = result;

    if (typeof result === 'number') {
        if (result < 0) {
            display.className = 'display negative';
        } else if (result > 0) {
            display.className = 'display positive';
        } else {
            display.className = 'display neutral';
        }
    } else {
        display.className = 'display neutral';
    }
}
