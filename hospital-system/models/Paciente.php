<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $data_nascimento
 * @property string|null $sexo
 *
 * @property Consulta[] $consultas
 */
class Paciente extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sexo'], 'default', 'value' => null],
            [['nome', 'cpf', 'data_nascimento'], 'required'],
            [['data_nascimento'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['cpf'], 'string', 'max' => 11],
            [['sexo'], 'string', 'max' => 1],
            [['cpf'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'data_nascimento' => 'Data Nascimento',
            'sexo' => 'Sexo',
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::class, ['paciente_id' => 'id']);
    }

}
