// const inputCPF = document.getElementById('cpf');

// inputCPF.addEventListener('keypress', () => {
//     let inputlength = inputCPF.value.length

//     if (inputlength === 3 || inputlength === 7) {
//         inputCPF.value += '.'
//     }else if (inputlength === 11){
//         inputCPF.value += '-'
//     }
// })
$('#cpf').mask('000.000.000-00');
$('#telefone').mask('(00) 00000-0000');
$('#data_nasc').mask('00/00/0000');


function validarPrimeiroDigito(cpf) {
    let sum = 0;
    for (let i = 0; i < 9; i++) {
      sum += cpf[i] * (10 - i);
    }
    const resto = (sum * 10) % 11;
    if (resto < 10) {
      return cpf[9] == resto;
    }
    return cpf[9] == 0;
}

function validarSegundoDigito(cpf) {
    let sum = 0;
    for (let i = 0; i < 10; i++) {
      sum += cpf[i] * (11 - i);
    }
    const resto = (sum * 10) % 11;
    if (resto < 10) {
      return cpf[10] == resto;
    }
    return cpf[10] == 0;
}

function validarRepetido(cpf) {
    const primeiro = cpf[0];
    let diferente = false;
    for(let i = 1; i < cpf.length; i++) {
      if(cpf[i] != primeiro) {
        diferente = true;
      }
    }
    return diferente;
}

function validarCpf(cpf) {
    if (cpf.length != 11) {
      return false;
    }
    if(!validarRepetido(cpf)) {
      return false;
    }
    if (!validarPrimeiroDigito(cpf)) {
      return false;
    }
    if (!validarSegundoDigito(cpf)) {
      return false;
    }
    return true;
}

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
  
  
// console.log(cpfValido);

function nomecheck(nome) {
    nome = document.getElementById('nome').value;
    if (nome.length === 0){
        document.getElementById('span-nome').innerHTML = 'É necessário informar um nome.'
        document.getElementById('span-nome').style.cssText = 'display: inline;'
        document.getElementById('nome').style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
    } else {
        document.getElementById('span-nome').style.cssText = 'display: none;'
        document.getElementById('nome').style.cssText = 'box-shadow: none;'
    }
}

function cpfcheck(cpf) {
    var cpf = document.getElementById('cpf').value;
    cpf = cpf.replace(/\.|-/g,"")
    const cpfValido = validarCpf(cpf);

    if (cpf.length === 0) {
        document.getElementById('span-cpf').innerHTML = 'É necessário informar um CPF.'
        document.getElementById('span-cpf').style.cssText = 'display: inline;'
        document.getElementById('cpf').style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
    } else if (cpfValido === false) {
        document.getElementById('cpf').style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
        document.getElementById('span-cpf').innerHTML = 'Digite um CPF válido.'
        document.getElementById('span-cpf').style.cssText = 'display: inline;'
    } else if (cpfValido === true) {
        document.getElementById('span-cpf').style.cssText = 'display: none;'
        document.getElementById('cpf').style.cssText = 'box-shadow: none;'
    }
}

function telefonecheck(telefone) {
  telefone = document.getElementById('telefone').value;
  if (telefone.length === 0) {
      document.getElementById('span-telefone').innerHTML = 'É necessário informar um telefone válido.'
      document.getElementById('span-telefone').style.cssText = 'display: inline;'
      document.getElementById('telefone').style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
  } else {
      document.getElementById('span-telefone').style.cssText = 'display: none;'
      document.getElementById('telefone').style.cssText = 'box-shadow: none;'
  }
}

function datacheck(valor) {
    data = validaData(valor)
    if (data === false) {
        document.getElementById('span-data').innerHTML = 'É necessário informar uma data válida.'
        document.getElementById('span-data').style.cssText = 'display: inline;'
        document.getElementById('data_nasc').style.cssText = 'box-shadow: 0px 0px 1px 2px red;'
    } else {
        document.getElementById('span-data').style.cssText = 'display: none;'
        document.getElementById('data_nasc').style.cssText = 'box-shadow: none;'
    }
}
