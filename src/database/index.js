const mysql = require("mysql2");
const { connect } = require("../routes");

const dbConfig = require('./config/databases');


async function foo(){
    const conn = await connect();
        return await conn.query('SELECT * FROM usuarios');     
}


module.exports={foo};