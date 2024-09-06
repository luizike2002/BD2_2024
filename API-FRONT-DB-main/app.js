// import module/package
const express = require("express");
const morgan = require("morgan");
const path = require("path");

const bodyParser = require("body-parser");
const app = express();
app.use(express.json());

app.use(express.urlencoded({ extended: true }));
// Set EJS as the view engine
app.set("view engine", "ejs");

// Set the views directory
app.set("views", path.join(__dirname, "views"));
app.use(express.static(path.join(__dirname, 'public')));

// setting middleware
app.use(morgan("dev"));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
// setting error path


require("./config/database.js");

const router = require("./routes/userRoutes.js");

app.use(router);

app.listen(3000, () => {
    console.log(`App rodando na porta 3000}`);
  });

app.use((req, res, next) => {
    const err = new Error(`${req.url} not found in this server`);
    err.status = 404;
    next(err);
});
// setting another error program
app.use((err, req, res, next) => {
    res.status(err.status || 500).json({ error: err.message });
});
// export app
module.exports = app;