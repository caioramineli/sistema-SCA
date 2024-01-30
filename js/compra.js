const form = document.querySelector('#form')
const inputs = document.getElementsByClassName('inputs')
const spans = document.getElementsByClassName('spans')

function setError(index) {
  inputs[index].style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
  spans[index].style.cssText = 'display: inline;'
}

function removeError(index) {
  inputs[index].style.cssText = 'box-shadow: none;'
  spans[index].style.cssText = 'display: none;'
}

function fornecedorcheck() {
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

function Enviar() {
    fornecedorcheck()
    produtocheck()
    quantidadecheck()
    if (fornecedorcheck() === true && produtocheck() === true && quantidadecheck() === true) {
        form.submit();
    }
}

function limparInputs() {
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


