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
