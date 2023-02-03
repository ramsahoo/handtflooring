const express = require("express");
const app = express();
app.get("/", function (req, res) {
    res.sendFile(__dirname + "./public/index.html");
});
app.listen(9000, function () {
    console.log("Server is running on localhost9000");
});