'use strict';

const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server);
const mysql = require('mysql');
var open = require('open');

app.use(express.static(__dirname + '/public'))
app.get('/', function(req, res) {
  res.sendFile(__dirname + '/index.html')
});

io.on('connection', function(client) {

  client.on('join', function() {

    //vamos buscar a sequência
    var connection = mysql.createConnection({
      host     : 'localhost',
      user     : 'root',
      password : '',
      database : 'arduino',
    });

    connection.connect();

    var query = ' \
    SELECT nome, rotina \
    FROM rotinas \
    WHERE uso=1';

    connection.query(query, function(err, rows, fields) {
      //agora vamos mandar o que recebemos pro sistema
      client.emit('data', rows[0]);
    });

    console.log('[CONFIG]');
    console.log('Estado Inicial');

  });

  client.on('novaetapa', function(etapa){
    console.log('[CONFIG]');
    console.log(etapa);
  });

  client.on('defaultstate', function(etapa){
    console.log('[CONFIG]');
    console.log('Estado Inicial');
  });

});

const port = process.env.PORT || 3000;

server.listen(port);
console.log('Server listening on http://localhost:'+port);
open('http://localhost:'+port);
