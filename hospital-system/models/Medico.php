<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medico".
 *
 * @property int $id
 * @property string $nome
 * @property string $crm
 * @property string|null $especialidade
 * @property string|null $telefone
 *
 * @property Consulta[] $consultas
 */
class Medico extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['especialidade', 'telefone'], 'default', 'value' => null],
            [['nome', 'crm'], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['crm'], 'string', 'max' => 15],
            [['especialidade'], 'string', 'max' => 100],
            [['telefone'], 'string', 'max' => 20],
            [['crm'], 'unique'],
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
            'crm' => 'Crm',
            'especialidade' => 'Especialidade',
            'telefone' => 'Telefone',
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::class, ['medico_id' => 'id']);
    }

}
