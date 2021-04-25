const express = require('express');
var bodyParser = require('body-parser');
var sha1 = require('sha1');
const mysql = require("mysql2");
const cookie = require('cookie-parser');

require("dotenv-safe").config();
const jwt = require('jsonwebtoken');


if(global.connection && global.connection.state !== 'disconect')
return global.connection;    

const con = mysql.createConnection("mysql://akva:root@localhost:3306/colegio_classea");
console.log("Conectou no MySQL!");
global.connection = con;

var app = express()
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }))
app.use(cookie());

app.get('/', function(req, res) {
    con.query('SELECT * FROM usuarios', (err, rows) => {
        if (err) throw err
    return res.json({Usuarios:rows})   
  });
})


app.post('/boletim', function(req, res) {

    escola = req.body.escola
    idSerie = req.body.idSerie
    turma   = req.body.turma
    turno   = req.body.turno
    matricula = req.body.matricula
    cpf = req.body.cpf
    bimestre=req.body.bimestre
    console.log(matricula)

   var url='http://206.81.10.115/relBoletimPorEstudante.php?escola='+escola+'&serie='+idSerie+'&turma='+turma+'&turno='+turno+'&matricula='+matricula+'&cpf='+cpf+'&bimestre='+bimestre;
    return res.redirect(url);


  });


app.post('/login',  function (req, res) {
   
    var login = req.body.login;

    var sql = 'SELECT * FROM usuarios WHERE login = '+ connection.escape(login);
    con.query(sql, function (error, results, fields) {
        if (error) {
            res.sendStatus(401).end();
            return;
        }

        var senha=sha1(req.body.senha);

        if(senha == results[0].senha){
            var id=results[0].idUsuario;

            const token = jwt.sign({id}, process.env.SECRET, {
                expiresIn: 300 // expires in 5min
              });

              res.send({usuario: results,auth: true, token: token })

        
        }else 
        {
            res.json({error:"Login ou senha inválido."});
        }

        })
  });

  


app.listen(9090, () => console.log(`Started server at http://localhost:8181!`));

