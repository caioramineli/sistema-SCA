const user = document.getElementById('usuario').value
const password = document.getElementById('senha').value

function Logar(){
    user = document.getElementById('usuario').value
    password = document.getElementById('senha').value
    if (user === 'aa' && password === 'aa')
    {
        location.href = 'tela-inicial.html'
    }
    else {
        alert('Senha incorreta')
    }
}