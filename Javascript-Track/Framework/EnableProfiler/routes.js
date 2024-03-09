/*
    Initialize Express Router
*/
const express = require("express");
const router = express.Router();
/*
    Controllers
*/
const StudentController = require(`./controllers/Students`);
/*
    router
*/
router.get("/", StudentController.index);
router.get("/students/profile", StudentController.profile);
router.post("/login", StudentController.login);
router.post("/register", StudentController.register);
router.get("/logoff", StudentController.logoff);
/*
    Export Router
*/
module.exports = router;