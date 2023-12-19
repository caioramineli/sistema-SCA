function trocarJanela() {
    location.href = 'tela-inicial.html'
}

function ErrarSenha(){
    document.getElementById('erro').style.cssText = 'display: inline;'
    document.getElementById('loading').style.cssText = 'display: none;'
    document.getElementById('entrar').style.cssText = 'display: inline'  
}

function EsconderSpan(){
    document.getElementById('erro').style.cssText = "display: none;"
}

function Logar(){
    EsconderSpan()
    var user = document.getElementById('usuario').value
    var senha = document.getElementById('senha').value
    if (user === 'aa' && senha === 'aa') {
        document.getElementById('entrar').style.cssText = 'display: none'
        document.getElementById('loading').style.cssText = 'display: inline;'
        setTimeout(trocarJanela , 2000)
    }
    else {
        document.getElementById('entrar').style.cssText = 'display: none'
        document.getElementById('loading').style.cssText = 'display: inline;'
        setTimeout(ErrarSenha , 2000)
    }
}

const icone = document.getElementById('icone');
const password = document.getElementById('senha');

function TrocarIcone(){
    if(password.type === 'password'){
        password.setAttribute('type','text');
        icone.classList.add('hide')
    }
    else{
        password.setAttribute('type','password');
        icone.classList.remove('hide')
    }
}