$('#cpf').mask('000.000.000-00');
$('#salario').mask('0.000,00');
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
  for (let i = 1; i < cpf.length; i++) {
    if (cpf[i] != primeiro) {
      diferente = true;
    }
  }
  return diferente;
}

function validarCpf(cpf) {
  if (cpf.length != 11) {
    return false;
  }
  if (!validarRepetido(cpf)) {
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

function nomecheck() {
  if (inputs[0].value.length < 3) {
      setError(0)
      return false
  } 
  else {
      removeError(0)
      return true
  }
}

function cpfcheck() {
  var cpf = inputs[1].value;
  cpf = cpf.replace(/\.|-/g,"")
  const cpfValido = validarCpf(cpf);

  if (cpfValido === false) {
      setError(1)
      return false
  } 
  else if (cpfValido === true) {
      removeError(1)
      return true
  }
}

function enderecocheck() {
  if (inputs[2].value.length === 0) {
      setError(2) 
      return false
  } 
  else {
      removeError(2)
      return true
  }
}

function telefonecheck() {
  if (inputs[3].value.length != 15) {
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
  nomecheck();
  cpfcheck();
  enderecocheck()
  telefonecheck();
  datacheck();
  if (nomecheck() === true && cpfcheck() === true && telefonecheck() === true && datacheck() === true) {
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

function setSpanCPF() {
  var texto = document.getElementById('span-cpf').innerHTML
  if (texto == 'CPF já cadastrado. Escolha outro CPF.' ) {
    inputs[1].style.cssText = 'box-shadow: 0px 0px 1px 2px red;';
  }
}
setSpanCPF();

function removeSpanCPF() {
  document.getElementById('span-cpf').style.cssText = 'display: none;'
}