var dataAtual = new Date();
var dia = dataAtual.getDate();
var mes = dataAtual.getMonth() + 1;
var ano = dataAtual.getFullYear();
let data_hoje = ano + "-" + mes + "-" + dia;

function formatarData(dataComBarra) {
    var partes = dataComBarra.split('/');
  
    var data = new Date(partes[2], partes[1] - 1, partes[0]); // meses são de 0 a 11
  
    var ano = data.getFullYear();
    var mes = padZero(data.getMonth() + 1); // Adiciona zero para meses menores que 10
    var dia = padZero(data.getDate());
  
    var dataFormatada = `${ano}-${mes}-${dia}`;
  
    return dataFormatada;
  }
  
function padZero(numero) {
    return numero < 10 ? '0' + numero : numero;
}

function setVencimentoSeteDias(id) {
    situacao[id].textContent = 'Não paga, Vence em menos de 7 dias!'
    situacao[id].style.color = 'red'
}

const situacao = document.getElementsByClassName('situacao')
const data_ven = document.getElementsByClassName('data')



var dataFutura = new Date();
dataFutura.setHours(0,0,0,0);
dataAtual.setHours(0,0,0,0);
var hoje = dataAtual.setDate(dataAtual.getDate())
var sete = dataFutura.setDate(dataAtual.getDate() + 7)


for (let i = 0; i < situacao.length; i++) {
    let data_formatada = formatarData(data_ven[i].innerHTML)
    var data_d = new Date(data_formatada)
    data_d.setHours(0,0,0,0);
    var data_Despesa = data_d.setDate(data_d.getDate() + 1);
    if (situacao[i].textContent == "Paga"){
        situacao[i].style.color = 'green'
    }

    if (situacao[i].textContent == "Não paga"){
        situacao[i].style.color = 'yellow'
        if (moment(data_hoje).isAfter(data_formatada)) {
            data_ven[i].style.color = 'red'
            if (data_ven[i].style.color == 'red') {
                situacao[i].textContent = 'Vencida'
                situacao[i].style.color = 'red'
            }
        }

        console.log(data_Despesa  + ' indice: ' + i);
        console.log(sete);
        console.log(hoje);


        if (data_Despesa === sete) {
            situacao[i].textContent = 'Não paga, Faltam 7 dias!'
            situacao[i].style.color = 'red'
        }
        
        else if (data_Despesa == hoje) {
            situacao[i].textContent = 'Não paga, Vence Hoje!'
            situacao[i].style.color = 'red'
        } 
        else if (data_Despesa < sete && data_Despesa > hoje) {
            setVencimentoSeteDias(i)
        }
    }
}

function abrirModal(){
    document.getElementById('modal').style.cssText = 'display: block;'
    document.getElementsByTagName('body')[0].style.cssText = 'overflow: hidden;'
}

function fecharModal(){
    document.getElementById('modal').style.cssText = 'display: none;';
    document.getElementsByTagName('body')[0].style.cssText = 'overflow: auto;';
    document.getElementById('valor_total').innerHTML = 'Valor Total:';
    inputs[0].value = "";
    removeError(0);
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

function despesacheck() {
    if (inputs[0].value == '') {
        setError(0)
        return false
    } 
    else {
        removeError(0)
        return true
    }
}

function getPreco() {
    var index = inputs[0].selectedIndex;
    var valor = inputs[0].options[index].text;
    var preco = valor.slice(valor.indexOf('$') + 2);
    if (inputs[0].value == "") {
        document.getElementById('valor_total').innerHTML = 'Valor Total:';
    }
    else {
        document.getElementById('valor_total').innerHTML = 'Valor Total: R$ ' + preco;
    }
}

function Pagar() {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        if (despesacheck() === true) {
            form.submit();
        }
    });
}