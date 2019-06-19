module.exports = app => {
  const controller = require('../controllers/inzendingen.controller.js');
  app.post('/api/inzendingen', controller.create);
  app.get('/api/inzendingen', controller.findAll);
  app.get('/api/inzendingen/:inzendingId', controller.findOne);
  app.put('/api/inzendingen/:inzendingId', controller.update);
  app.delete('/api/inzendingen/:inzendingId', controller.delete);
};
