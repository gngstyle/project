<?php

namespace vendor\gngstyle\project\src\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $country_id
 * @property int $planes_plane_id
 * @property string $country_name
 * @property int $abGirisYili
 * @property string $paraBirimi
 *
 * @property Planes $planesPlane
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['planes_plane_id', 'country_name', 'abGirisYili', 'paraBirimi'], 'required'],
            [['planes_plane_id', 'abGirisYili'], 'integer'],
            [['country_name', 'paraBirimi'], 'string', 'max' => 255],
            [['planes_plane_id'], 'exist', 'skipOnError' => true, 'targetClass' => Planes::className(), 'targetAttribute' => ['planes_plane_id' => 'plane_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'planes_plane_id' => 'Planes Plane ID',
            'country_name' => 'Country Name',
            'abGirisYili' => 'Ab Giris Yili',
            'paraBirimi' => 'Para Birimi',
        ];
    }

    /**
     * Gets query for [[PlanesPlane]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanesPlane()
    {
        return $this->hasOne(Planes::className(), ['plane_id' => 'planes_plane_id']);
    }
}
