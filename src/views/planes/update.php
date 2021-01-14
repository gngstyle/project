<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\gngstyle\project\src\models\Planes */

$this->title = 'Update Planes: ' . $model->plane_id;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->plane_id, 'url' => ['view', 'id' => $model->plane_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
