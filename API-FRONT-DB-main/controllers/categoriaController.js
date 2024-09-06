const model = require("../models");  // Importa os modelos
const controller = {};

// Exibir todas as categorias
controller.getAllCategories = async function (req, res) {
    try {
        const categories = await model.categoria.findAll(); // Busca todas as categorias
        return res.render("categorias", { categories }); // Renderiza a página com as categorias
    } catch (error) {
        return res.status(500).json({ message: "Error fetching categories", error: error.message });
    }
};

// Renderizar o formulário de criação de nova categoria
controller.renderCategoryForm = function (req, res) {
    return res.render("formularioCategoria"); // Renderiza o formulário para nova categoria
};

// Criar uma nova categoria
controller.createCategory = async function (req, res) {
    try {
        const data = await model.categoria.create({
            nome: req.body.nome // Adiciona o nome da nova categoria
        });
        return res.status(201).json({ message: "Category created successfully", data });
    } catch (error) {
        return res.status(500).json({ message: "Error creating category", error: error.message });
    }
};

module.exports = controller;
