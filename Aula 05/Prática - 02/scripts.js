document.addEventListener('DOMContentLoaded', function () {
    const averageGeneralBtn = document.getElementById('averageGeneralBtn');
    const averageFinalBtn = document.getElementById('averageFinalBtn');
    const tabelaNotas = document.getElementById('tabelaNotas');

    function calcularMediaLinha(linha) {
        let soma = 0;
        let contador = 0;

        for (let i = 1; i < linha.cells.length - 1; i++) {
            const valor = parseFloat(linha.cells[i].textContent.replace(',', '.'));
            if (!isNaN(valor)) {
                soma += valor;
                contador++;
            }
        }

        return contador > 0 ? (soma / contador).toFixed(2).replace('.', ',') : '0,00';
    }

    function atualizarColunaTotalizadora() {
        const linhas = tabelaNotas.querySelectorAll('tbody tr');
        const numColunas = tabelaNotas.querySelector('thead tr').cells.length;

        if (numColunas <= 10) {
            const th = document.createElement('th');
            th.textContent = 'Média Final';
            th.classList.add('notas');
            tabelaNotas.querySelector('thead tr').appendChild(th);

            linhas.forEach(linha => {
                const media = calcularMediaLinha(linha);
                const celulaMedia = linha.insertCell(-1);
                celulaMedia.textContent = media;
                celulaMedia.classList.add('notas');
            });
        } else {
            const maxMedias = 3;

            if (tabelaNotas.querySelector('thead tr').cells.length > 10) {
                const linhas = tabelaNotas.querySelectorAll('tbody tr');
                linhas.forEach(linha => {
                    const totalCells = linha.cells.length;
                    while (totalCells > 10 + maxMedias) {
                        linha.deleteCell(-1);
                        totalCells--;
                    }
                });

                const ths = tabelaNotas.querySelectorAll('thead tr th');
                for (let i = ths.length - 1; i >= 10; i--) {
                    if (ths[i].textContent === 'Média Final') {
                        tabelaNotas.querySelector('thead tr').deleteCell(i);
                    }
                }
            }

            const th = document.createElement('th');
            th.textContent = 'Média Final';
            th.classList.add('notas');
            tabelaNotas.querySelector('thead tr').appendChild(th);

            linhas.forEach(linha => {
                const media = calcularMediaLinha(linha);
                const celulaMedia = linha.insertCell(-1);
                celulaMedia.textContent = media;
                celulaMedia.classList.add('notas');
            });
        }
    }

    function atualizarLinhaTotalizadora() {
        let tFoot = tabelaNotas.querySelector('tfoot');

        if (!tFoot) {
            tFoot = tabelaNotas.createTFoot();
        }

        let linhaTotalizadora = tFoot.querySelector('tr');

        if (!linhaTotalizadora) {
            linhaTotalizadora = tFoot.insertRow(-1);
            linhaTotalizadora.insertCell(0).textContent = 'Média Geral';
            linhaTotalizadora.cells[0].classList.add('total');
        } else {
            while (linhaTotalizadora.cells.length > 1) {
                linhaTotalizadora.deleteCell(-1);
            }
        }

        const numColunas = tabelaNotas.querySelector('thead tr').cells.length;

        for (let i = 1; i < numColunas; i++) {
            let soma = 0;
            let contador = 0;

            for (let j = 1; j < tabelaNotas.rows.length - 1; j++) {
                const valor = parseFloat(tabelaNotas.rows[j].cells[i].textContent.replace(',', '.'));
                if (!isNaN(valor)) {
                    soma += valor;
                    contador++;
                }
            }

            const media = contador > 0 ? (soma / contador).toFixed(2).replace('.', ',') : '0,00';
            const celulaTotal = linhaTotalizadora.insertCell(-1);
            celulaTotal.textContent = media;
            celulaTotal.classList.add('total');
        }

        if (linhaTotalizadora.cells.length < numColunas) {
            while (linhaTotalizadora.cells.length < numColunas) {
                linhaTotalizadora.insertCell(-1);
            }
        }
    }

    averageFinalBtn.addEventListener('click', atualizarColunaTotalizadora);
    averageGeneralBtn.addEventListener('click', atualizarLinhaTotalizadora);
});
