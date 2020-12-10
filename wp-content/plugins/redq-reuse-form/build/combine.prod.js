const admin = require('./admin.prod')();
const reuse = require('./reuse.prod')();

process.noDeprecation = true;
module.exports = [admin, reuse];
