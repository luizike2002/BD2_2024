const express = require("express");
const router = express.Router();
const controller = require("../controllers/indexController");
const controllerCategoria = require("../controllers/categoriaController");

router.get("/carros", controller.getAll);
router.get("/carros/new", controller.renderCarForm);
router.post("/carros", controller.createNew);
router.get("/categorias", controllerCategoria.getAllCategories);
router.get("/categorias/new", controllerCategoria.renderCategoryForm);
router.post("/categorias", controllerCategoria.createCategory);

module.exports = router;
