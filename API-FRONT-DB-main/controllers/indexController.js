const model = require("../models"); // Importa os modelos
const controller = {}; // Declara o controller antes de seu uso

// Buscar todos os carros, incluindo suas categorias associadas
controller.getAll = async function (req, res) {
    try {
        const userData = await model.carro.findAll({
            include: [{ model: model.categoria }]  // Certifique-se de que 'categoria' está importado corretamente
        });

        return res.render("carros", { data: userData });  // Renderiza a página com os dados dos carros
    } catch (error) {
        return res.status(500).json({ message: "Error fetching cars", error: error.message });
    }
};

// Exibir o formulário com as categorias
controller.renderCarForm = async function (req, res) {
    try {
        const categories = await model.categoria.findAll(); // Busca todas as categorias
        return res.render("form", { categories }); // Passa as categorias para o formulário
    } catch (error) {
        return res.status(500).json({ message: "Error fetching categories", error: error.message });
    }
};

// Criar novo carro
controller.createNew = async function (req, res) {
    try {
        const data = await model.carro.create({
            nome: req.body.nome,
            cor: req.body.cor,
            modelo: req.body.modelo,
            ano: req.body.ano,
            categoriaId: req.body.categoriaId  // Associa o carro à categoria selecionada
        });
        return res.status(201).json({ message: "Car created successfully", data });
    } catch (error) {
        return res.status(500).json({ message: "Error creating car", error: error.message });
    }
};

module.exports = controller; // Exporta o controller
