const Inzending = require('../models/inzending.model.js');

exports.create = (req, res) => {
  if (!req.body.opdracht) {
    return res.status(500).send({err: 'title can not be empty'});
  }
  const inzending = new Inzending({
    opdracht: req.body.opdracht,
    link: req.body.link,
    scouts: req.body.scouts
  });

  inzending
    .save()
    .then(inzending => res.send(inzending))
    .catch(err => {
      res.status(500).send({error: err.inzending || 'Error'});
    });
};

exports.findAll = async (req, res) => {
  try {
    const inzendingen = await Inzending.find();
    res.send(inzendingen);
  } catch (err) {
    res.status(500).send({err: err.inzending || 'Error'});
  }
};

exports.findOne = async (req, res) => {
  try {
    const inzending = await Inzending.findById(req.params.bookId);
    if (inzending) {
      res.send(inzending);
    } else {
      res.status(404).send('No book found');
    }
  } catch (err) {
    if (err.kind === 'ObjectId') {
      return res.status(500).send('Geen geldig ID');
    }
    return res.status(500).send(err);
  }
};

exports.update = async (req, res) => {
  if (!req.body.title) {
    return res.status(400).send('title mag niet leeg zijn');
  }

  try {
    const inzending = await Inzending.findByIdAndUpdate(
      req.params.bookId,
      {
        opdracht: req.body.title,
        link: req.body.link,
        scouts: req.body.scouts
      },
      {
        new: true
      }
    );

    if (!inzending) {
      return res.status(404).send('No book found');
    }
    res.send(inzending);
  } catch (err) {
    if (err.kind === 'ObjectId') {
      return res.status(417).send('Geen geldig ID');
    }
    return res.status(500).send(err);
  }
};

exports.delete = async (req, res) => {
  try {
    const inzending = await Inzending.findByIdAndRemove(req.params.bookId);
    if (!inzending) {
      return res.status(404).send('No book found');
    }
    res.send(inzending);
  } catch (err) {
    if (err.kind === 'ObjectId') {
      return res.status(417).send('Geen geldig ID');
    }
    return res.status(500).send(err);
  }
};
