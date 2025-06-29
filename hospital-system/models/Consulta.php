<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $id
 * @property int $paciente_id
 * @property int $medico_id
 * @property string $data_consulta
 * @property string|null $observacoes
 *
 * @property Medico $medico
 * @property Paciente $paciente
 */
class Consulta extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['observacoes'], 'default', 'value' => null],
            [['paciente_id', 'medico_id', 'data_consulta'], 'required'],
            [['paciente_id', 'medico_id'], 'integer'],
            [['data_consulta'], 'safe'],
            [['observacoes'], 'string'],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::class, 'targetAttribute' => ['paciente_id' => 'id']],
            [['medico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medico::class, 'targetAttribute' => ['medico_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paciente_id' => 'Paciente ID',
            'medico_id' => 'Medico ID',
            'data_consulta' => 'Data Consulta',
            'observacoes' => 'Observacoes',
        ];
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(Medico::class, ['id' => 'medico_id']);
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::class, ['id' => 'paciente_id']);
    }

}
