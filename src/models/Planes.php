<?php

namespace vendor\gngstyle\project\src\models;

use Yii;

/**
 * This is the model class for table "planes".
 *
 * @property int $plane_id
 * @property string $plane_model
 * @property int|null $plane_adet
 *
 * @property Countries[] $countries
 */
class Planes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plane_model'], 'required'],
            [['plane_adet'], 'integer'],
            [['plane_model'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'plane_id' => 'Plane ID',
            'plane_model' => 'Plane Model',
            'plane_adet' => 'Plane Adet',
        ];
    }

    /**
     * Gets query for [[Countries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Countries::className(), ['planes_plane_id' => 'plane_id']);
    }
}
