
<h1>View Pelamar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'no_ktp',
		'nama',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'status',
		'jumlah_anak',
		'alamat',
		'kota',
		'tlp',
		'pendidikan',
		'jenjang',
		'jurusan',
		'tahun_lulus',
		'skill',
		'cover_letter',
		array(               // cv
            'label'=>'CV',
            'type'=>'raw',
            'value'=>CHtml::link('Download CV', Yii::app()->baseUrl.'/cv/'.$model->cv ),
        ),
	),
)); 
?>
Pengalaman Kerja
<?php
foreach ($pengalamans as $j=>$item) {
	$this->widget('zii.widgets.grid.CDetailView', array(
		'data'=>$pengalamans[$j],
		'attributes'=>array(
			'id',
			'nama_perusahaan',
			'gaji_terkahir',
			'tanggal_mulai',
			'tanggal_akhir',
			'posisi',
			'jenis',
			'alasan_berhenti',
		)));
}
//nampilin edit
echo CHtml::link('Edit Data Diri', array('pelamar/update', 'id'=>$model->id) );

?>


