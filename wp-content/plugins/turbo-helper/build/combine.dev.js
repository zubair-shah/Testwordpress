const admin = require('./admin.dev')();
const front = require('./frontend.dev')();

process.noDeprecation = true;
module.exports = [admin];

//console.log(reuse());
