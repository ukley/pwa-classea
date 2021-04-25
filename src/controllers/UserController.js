

    async function login(){
        const db = require("../database/config");
        var usuarios=('SELECT * FROM usuarios');

        return await db.query(usuarios);        
   
    }

