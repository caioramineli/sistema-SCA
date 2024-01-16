const form = document.querySelector('#form')
const inputs = document.getElementsByClassName('inputs')
const spans = document.getElementsByClassName('spans')
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

$('#cnpj').mask('00.000.000/0000-00');
$('#telefone').mask('(00) 00000-0000');
$('#data_nasc').mask('00/00/0000');

function validarCNPJ(entradaCNPJ){
    let cnpj = entradaCNPJ.replaceAll(/[.\-_\s/]/gi,"").padStart(14,"0")
    let exp  = `${cnpj[0]}{14}|[a-z\W]`
    let exp2 = new RegExp(exp,'gi')
    if(exp2.test(cnpj)){ return false }

    let dígitoVerificacao1 =
    ( ( (cnpj[0] * 5) +
        (cnpj[1] * 4) +
        (cnpj[2] * 3) +
        (cnpj[3] * 2) +
        (cnpj[4] * 9) +
        (cnpj[5] * 8) +
        (cnpj[6] * 7) +
        (cnpj[7] * 6) +
        (cnpj[8] * 5) +
        (cnpj[9] * 4) +
        (cnpj[10] * 3) +
        (cnpj[11] * 2) ) * 10) % 11

    dígitoVerificacao1==10 ? dígitoVerificacao1=0 : null

    let dígitoVerificacao2=
    ( ( (cnpj[0] * 6) +
        (cnpj[1] * 5) +
        (cnpj[2] * 4) +
        (cnpj[3] * 3) +
        (cnpj[4] * 2) +
        (cnpj[5] * 9) +
        (cnpj[6] * 8) +
        (cnpj[7] * 7) +
        (cnpj[8] * 6) +
        (cnpj[9] * 5) +
        (cnpj[10] * 4) +
        (cnpj[11] * 3) +
        (cnpj[12] * 2) ) * 10) % 11

    dígitoVerificacao2==10 ? dígitoVerificacao2=0 : null

    if(dígitoVerificacao1 == cnpj[12] && dígitoVerificacao2 == cnpj[13]){
        return true
    }else{
        return false
    }
}

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

function cnpjcheck() {
    var cnpj = inputs[1].value;
    const cpfValido = validarCNPJ(cnpj);
    if (cpfValido === false) {
        setError(1)
        return false
    } 
    else if (cpfValido === true) {
        removeError(1)
        return true
    }
}

function emailcheck() {
    if (emailRegex.test(inputs[2].value)) { 
        removeError(2)
        return true
        
    }
    else {
        setError(2)
        return false
    }
}

function enderecocheck() {
    if (inputs[3].value.length === 0) {
        setError(3) 
        return false
    } 
    else {
        removeError(3)
        return true
    }
}

function telefonecheck() {
    if (inputs[4].value.length != 15) {
        setError(4)
        return false
    } 
    else {
        removeError(4)
        return true
    }
}

function prazocheck() {
    if (inputs[5].value.length === 0) {
        setError(5)
        return false
    } else {
        removeError(5)
        return true
    }
}

function Enviar() {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        nomecheck();
        cnpjcheck();
        emailcheck();
        enderecocheck()
        telefonecheck();
        prazocheck();
        if (nomecheck() === true && cnpjcheck() === true && emailcheck() === true && telefonecheck() && enderecocheck() === true && prazocheck() === true) {
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

function setSpanCNPJ() {
    const span = form.querySelector("#span-cnpj");
    if (span !== null) {
        var texto = document.getElementById('span-cnpj').innerHTML
        if (texto == 'CPF já cadastrado. Escolha outro CPF.' ) {
            inputs[1].style.cssText = 'box-shadow: 0px 0px 1px 2px red;';
        }
    }
}
setSpanCNPJ();

function removeSpanCNPJ() {
    document.getElementById('span-cnpj').style.cssText = 'display: none;';
}