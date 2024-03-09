/*
    Initialize Express Router
*/
const express = require("express");
const router = express.Router();
/*
    Controllers
*/
const PlayerController = require(`./controllers/Players`);
/*
    router
*/
router.get("/", PlayerController.index);
router.post("/filter", PlayerController.filter);

module.exports = router;