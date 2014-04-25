<?php
/* @var $this PelamarController */
/* @var $model Pelamar */

$this->breadcrumbs=array(
	'Pelamars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pelamar', 'url'=>array('index')),
	array('label'=>'Create Pelamar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pelamar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pelamars</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php
//  $this->renderPartial('_search',array(
// 	'model'=>$model,
// )); ?>
</div><!-- search-form -->

<?php 

$this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$model,
    'columns'=>array(
        'nama',
        'tanggal_lahir', 
        'jenis_kelamin', 
        'status',
		'kota',
		'tlp',
		'pendidikan',
		'skill',
		'cv',// Relation value given in model
    )
));

// $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'pelamar-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		'id',
// 		'no_ktp',
// 		'nama',
// 		'tempat_lahir',
// 		'tanggal_lahir',
// 		'jenis_kelamin',
// 		/*
// 		'status',
// 		'jumlah_anak',
// 		'alamat',
// 		'kota',
// 		'tlp',
// 		'pendidikan',
// 		'jenjang',
// 		'jurusan',
// 		'tahun_lulus',
// 		'skill',
// 		'cover_letter',
// 		'cv',
// 		*/
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// )); ?>
