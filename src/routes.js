const express = require('express');
const routes = express.Router();


const UserController = require('./controllers/UserController');

routes.get('/',(req,res) =>{
    return res.json({hello:'World'});
});

routes.get('users', (req,res) => {
        const db = require("../database/config");
        const usuarios=('SELECT * FROM usuarios');
        //return db.query(usuarios);     
});

module.exports=routes;