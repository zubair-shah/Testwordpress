const admin = require('./admin.dev')();
const reuse = require('./reuse.dev')();

process.noDeprecation = true;
module.exports = [admin, reuse];
