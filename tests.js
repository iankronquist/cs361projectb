require('./app');

var request_builder = require('request');
var request = request_builder.defaults({encoding: null});
var expect = require('expect.js');

describe('GET /', function() {
  it('should succeed', function(done) {
    request.get('http://localhost:8000/', function(err, res) {
      expect(res.statusCode).to.be(200);
      done();
    });
  });
});
