const Carro = require('./carroModel');
const Categoria = require('./categoria');

// Associação
Carro.belongsTo(Categoria, { foreignKey: 'categoriaId' });
Categoria.hasMany(Carro, { foreignKey: 'categoriaId' });

module.exports = {
    carro: Carro,
    categoria: Categoria
};
