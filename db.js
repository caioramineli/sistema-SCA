// const { disconnect } = require("process");

async function connect(){
    if(global.connection && global.connection.state !== 'disconnected')
        return global.connection;
        
    const mysql = require("mysql2/promise");
    const connection = await mysql.createConnection("mysql://root:@localhost:3306/sca");
    console.log("Conectou no Mysql!");
    global.connection = connection;
    return connection;
}

// connect();

async function selectCostumersbyCPF(cpf){
    const conn = await connect();
    const [rows] = await conn.query("SELECT * FROM cliente WHERE cpf = '"+cpf+"';");
    return rows;
}

module.exports = {selectCostumersbyCPF}