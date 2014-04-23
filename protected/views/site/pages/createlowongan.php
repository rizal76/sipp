
								<h1 class="judul"> <img src="images/lowongan.png" width="50" height="50">Lowongan</h1>
								<br>
								<form class="form-horizontal">
							 <form class="form-horizontal">
							  <fieldset>
							    <div class="form-group">
							      <label for="inputEmail" class="col-lg-2 control-label">Nama Lowongan</label>
							      <div class="col-lg-9">
								<input type="text" class="form-control" id="namaTugas">
							      </div>
							    </div>
							    <div class="form-group">
							      <label for="textArea" class="col-lg-2 control-label">Deskripsi</label>
							      <div class="col-lg-9">
								<textarea class="form-control" rows="4" id="Jenis Tugas" ></textarea>
							      </div>
							    </div>
							    <div class="form-group">
							      <label for="textArea" class="col-lg-2 control-label">Persyaratan</label>
							      <div class="col-lg-9">
								<textarea class="form-control" rows="4" id="Jenis Tugas" ></textarea>
							      </div>
							      </div>
							</fieldset>
							</form>
							<div class="col-lg-11">
							<div class= "text-right">
							<button type="button" class="btn btn-primary btn-sm"><?php echo CHtml::link('Create Lowongan', array('/site/page', 'view'=>'simpanlowongan')); ?></button></div>
								       </div>
							</div>