<?php
use dosamigos\fileupload\FileUploadUI;
use d1soft\filemanager\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel d1soft\filemanager\models\Mediafile */

?>

<header id="header"><span class="glyphicon glyphicon-upload"></span> <?= Module::t('main', 'Upload manager') ?></header>

<div id="uploadmanager">
    <p><?= Html::a('← ' . Module::t('main', 'Back to file manager'), ['file/filemanager']) ?></p>
    <?= FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'file',
        'clientOptions' => [
            'autoUpload'=> Yii::$app->getModule('filemanager')->autoUpload,
        ],
        'clientEvents' => [
            'fileuploadsubmit' => "function (e, data) { data.formData = [{name: 'tagIds', value: $('#filemanager-tagIds').val()}]; }",
        ],
        'url' => ['upload'],
        'gallery' => false,
        'formView' => '/file/_upload_form',
    ]) ?>
</div>
