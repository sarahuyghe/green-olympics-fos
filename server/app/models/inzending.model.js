const mongoose = require('mongoose');

const InzendingSchema = mongoose.Schema(
  {
    opdracht: String,
    link: String,
    scouts: String
  },
  {
    timestamps: true
  }
);

module.exports = mongoose.model('Inzending', InzendingSchema, 'inzendingen');
