const form = document.querySelector('#form')
const inputs = document.getElementsByClassName('inputs')
const spans = document.getElementsByClassName('spans')
const tabela = document.getElementById('tabela');

function setError(index) {
    inputs[index].style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
    spans[index].style.cssText = 'display: inline;'
}

function removeError(index) {
    inputs[index].style.cssText = 'box-shadow: none;'
    spans[index].style.cssText = 'display: none;'
}

function clientecheck() {
    if (inputs[0].value == '') {
        setError(0)
        return false
    } 
    else {
        removeError(0)
        return true
    }
}

function produtocheck() {
    if (inputs[1].value == '') {
        setError(1)
        return false
    } else {
        removeError(1)
        return true
    }
}

function quantidadecheck() {
    if (inputs[2].value.length == '' || inputs[2].value == '0') {
        setError(2)
        return false
    } else {
        removeError(2)
        return true
    }
}

function pagamentocheck() {
    if (inputs[4].value == '') {
        setError(4)
        return false
    } 
    else {
        removeError(4)
        return true
    }
}

function limparInputs() {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
    });
    var tabela = document.getElementById("tabela");
    var corpoTabela = tabela.getElementsByTagName('tbody')[0];
    while (corpoTabela.rows.length > 0) {
        corpoTabela.deleteRow(0);
    }
    for (var i = 0; i < inputs.length; i++) {
        removeError(i);
        inputs[i].value = '';
    }
    
}

function getPreco() {
    var index = inputs[1].selectedIndex;
    var valor = inputs[1].options[index].text;
    var preco = valor.slice(valor.indexOf('$') + 2);
    var preco_formatado = preco.replace(',', '.');
    if (inputs[1].value == '') {
        document.getElementById('preco').innerHTML = 'Preço:';
    }
    else {
        document.getElementById('preco').innerHTML = 'Preço: R$ ' + preco;
        if (inputs[2].value != '') {
            var total = parseFloat(preco_formatado) * inputs[2].value;
            inputs[3].value = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
        else {
            inputs[3].value = ''
        }
    }
}

function TamInput() {
    if (inputs[2].value > 1000){
        inputs[2].value = 1000;
    } 
}

function verificarTodos(){
    clientecheck()
    produtocheck()
    quantidadecheck()
}

let adicionou = false;
function adicionarNaTabela() {
    verificarTodos()
    if (clientecheck() === true && produtocheck() === true && quantidadecheck() === true) {
        
        var index = inputs[1].selectedIndex;
        var nome = inputs[1].options[index].text;
        var posicao = nome.indexOf(',');
        var nome_produto = nome.substring(0, posicao);

        var cod_produto = inputs[1].value;

        
        var preco = document.getElementById('preco').textContent;
        var precoReal = preco.slice(preco.indexOf(':') + 2);

        var quantidade = inputs[2].value;
        var valor_total = inputs[3].value;

        var tabela_insert = tabela.getElementsByTagName('tbody')[0];
        var novaLinha = tabela_insert.insertRow(tabela_insert.rows.length);

        var row_np = novaLinha.insertCell(0);
        row_np.innerHTML = nome_produto;

        var row_cp = novaLinha.insertCell(1);
        row_cp.innerHTML = cod_produto;

        var row_q = novaLinha.insertCell(2);
        row_q.innerHTML = precoReal;

        var row_p = novaLinha.insertCell(3);
        row_p.innerHTML = quantidade;

        var row_vt = novaLinha.insertCell(4);
        row_vt.innerHTML = valor_total;

        adicionou = true;
        
        inputs[1].value = "";
        inputs[2].value = "";
        document.getElementById('preco').textContent = 'Preço:';
        inputs[3].value= "";

        if (spans[3].style.display == 'inline') {
            spans[3].style.display = 'none'
        }
    }
}

function abrirModal(){
    if (clientecheck() === true && tabela.rows.length > 1) {
        document.getElementById('modal').style.cssText = 'display: block;'
        document.getElementsByTagName('body')[0].style.cssText = 'overflow: hidden;'
        var index = inputs[0].selectedIndex;
        var nome = inputs[0].options[index].text;
        document.getElementById('cliente_venda').innerHTML = 'Cliente: ' + nome;
        document.getElementById('cpf').innerHTML = 'CPF: ' + inputs[0].value;
        document.getElementById('valor_total_venda').innerHTML ='Valor total: R$ ' + somarUltimaColuna();
    }
    else {
        spans[3].style.display = 'inline'
    }
}

function fecharModal(){
    document.getElementById('modal').style.cssText = 'display: none;';
    document.getElementsByTagName('body')[0].style.cssText = 'overflow: auto;';
    document.getElementById('valor_total_venda').innerHTML = 'Valor Total:';
    removeError(4);
}

function somarUltimaColuna() {
    var soma = 0;
    for (var i = 1; i < tabela.rows.length; i++) {
        var valorCelula = tabela.rows[i].cells[tabela.rows[i].cells.length - 1].innerText;
        var valorNumerico = parseFloat(valorCelula.replace(/\s|&nbsp;/g, "").replace("R$", "").replace(",", "."));
        if (!isNaN(valorNumerico)) {
            soma += valorNumerico;
        }
    }
    return soma.toFixed(2);
}

function enviarParaPHP() {
    var index = inputs[0].selectedIndex;
    var cliente= inputs[0].options[index].text;
    var fk_cpf = inputs[0].value;
    var valor_total = somarUltimaColuna();
    var tipo_pagamento = inputs[4].value;

    console.log(cliente, fk_cpf, valor_total, tipo_pagamento)
    // var valor = 'teste';

    // Configurar a requisição Fetch
    fetch('../processamento/processamento.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body:   'cliente=' + encodeURIComponent(cliente) + 
                '&fk_cpf=' + encodeURIComponent(fk_cpf) + 
                '&valor_total=' + encodeURIComponent(valor_total) + 
                '&tipo_pagamento=' + encodeURIComponent(tipo_pagamento),
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error(error);
    });
}

function Confirmar() {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        if (pagamentocheck() === true) {
            enviarParaPHP()
            form.submit();
        }
    });
}