<div class="text-content">
								
								<h1 class="judul"> <img src="images/tugas.png" width="50" height="50">Tugas</h1>
								
								<form class="form-horizontal">
							 <form class="form-horizontal">
							  <fieldset>
							    <div class="form-group">
							      <label for="inputEmail" class="col-lg-2 control-label">Nama Tugas</label>
							      <div class="col-lg-9">
								<input type="text" class="form-control" id="namaTugas">
							      </div>
							    </div>
							    <div class="form-group">
							      <label for="textArea" class="col-lg-2 control-label">Jenis Tugas</label>
							      <div class="col-lg-9">
								<textarea class="form-control" rows="4" id="Jenis Tugas" ></textarea>
							      </div>
							    </div>
							    <div class="form-group">
							      <label for="inputEmail" class="col-lg-2 control-label">File Tugas</label>
							      <div class="col-lg-4">
							      <input class="form-control" name="User[url_image]" id="User_url_image" type="file">
							      </div>
							    </div>
							  </fieldset>
							</form>
							<div class="col-lg-11">
							<div class= "text-right">
							<button type="button" class="btn btn-primary btn-sm"><?php echo CHtml::link('Simpan', array('/site/page', 'view'=>'daftartugas')); ?></button></div>
								       </div>
							</div>