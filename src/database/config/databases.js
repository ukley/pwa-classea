
async function connect(){

    if(global.connection && global.connection.state !== 'disconect')
        return global.connection;    

    const mysql = require("mysql2/promise");
    const connection = await mysql.createConnection("mysql://akva:root@localhost:3306/colegio_classea");
    global.connection = connection;
    return connection;
    }
    connect();

module.exports={}