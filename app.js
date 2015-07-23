//Library requirements
var express = require('express');
var ejs = require('ejs');

var app = express();
app.engine('.html', require('ejs').__express);


app.listen(process.env.PORT || 8000, function() {
    console.log('App now listening on http://localhost:%s',
      process.env.PORT || 8000);
});

app.get('/', function(req, res) {
    return res.render('index.html', {'message': 'hello nodejs!'});
});
