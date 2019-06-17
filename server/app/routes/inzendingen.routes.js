module.exports = app => {
  const controller = require('../controllers/inzendingen.controller.js');
  app.post('/inzendingen', controller.create);
  app.get('/inzendingen', controller.findAll);
  app.get('/inzendingen/:inzendingId', controller.findOne);
  app.put('/inzendingen/:inzendingId', controller.update);
  app.delete('/inzendingen/:inzendingId', controller.delete);
};
