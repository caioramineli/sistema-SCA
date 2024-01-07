
//  cpf = '477.062.538-30';
// function getCPF() {
//     let cpf = document.getElementById('cpf').value;
//     return cpf;
// }

// (async () => {
//     const db = require("./db");
//     // console.log('Começou!');
//     // console.log('SELECT * FROM CLIENTE');
//     const clientes = await db.selectCostumersbyCPF('');
//     console.log(clientes);
// })();
// import "./start/addRequire.js";
async function getCPF(cpf_busca) {
    const db = require("./db");
    const clientes = await db.selectCostumersbyCPF(cpf_busca);
    console.log(clientes);
}
getCPF();   