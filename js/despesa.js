$('#valor').mask('00.000,00', {reverse: true});
$('#data_ven').mask('00/00/0000');

function validaData(valor) {
    if (typeof valor !== 'string') {
      return false
    }
    if (!/^\d{2}\/\d{2}\/\d{4}$/.test(valor)) {
      return false
    }

    const partesData = valor.split('/')
    const data = { 
      dia: partesData[0], 
      mes: partesData[1], 
      ano: partesData[2] 
    }

    const dia = parseInt(data.dia)
    const mes = parseInt(data.mes)
    const ano = parseInt(data.ano)

    const diasNoMes = [ 0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ]
    
    if (ano % 400 === 0 || ano % 4 === 0 && ano % 100 !== 0) {
        diasNoMes[2] = 29
    }

    if (mes < 1 || mes > 12 || dia < 1) {
        return false
    }
    else if (dia > diasNoMes[mes]) {
        return false
    }

    return true
}

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

function tipocheck() {
    if (inputs[0].value == '') {
        setError(0)
        return false
    } 
    else {
        removeError(0)
        return true
    }
}

function nomecheck() {
    if (inputs[1].value.length < 3) {
        setError(1)
        return false
    } 
    else {
        removeError(1)
        return true
    }
}

function descricaocheck() {
    if (inputs[2].value.length < 5) {
        setError(2) 
        return false
    } 
    else {
        removeError(2)
        return true
    }
  }

function valorcheck() {
    if (inputs[3].value.length == 0) {
        setError(3)
        return false
    } 
    else {
        removeError(3)
        return true
    }
}

function datacheck() {
    var data = inputs[4].value;
    const dataValidate = validaData(data)
    if (dataValidate === false) {
        setError(4)
        return false
    } else {
        removeError(4)
        return true
    }
}

function Enviar() {
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    tipocheck();
    nomecheck();
    descricaocheck();
    valorcheck();
    datacheck();
    if (tipocheck() === true && nomecheck() === true && descricaocheck() === true && valorcheck() === true &&  datacheck() === true) {
        form.submit();
    }
});
}

function limparInputs() {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
    });
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
        removeError(i);
    }
}


