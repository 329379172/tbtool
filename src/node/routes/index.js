var express = require('express');
var router = express.Router();
var taobao = require('./jquery1314');
/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

router.get('/token',function(req, res, next){
    var d = req.query.d;
    var c = req.query.c;
    if(d && c){
        res.end(taobao.To(d + c + '8') + '_' + d);
    }else{
        res.end('');
    }
});

module.exports = router;
