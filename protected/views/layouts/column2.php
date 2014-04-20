<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="menu-left">
						<ul>
							<li><a href="">Kenapa TRASPAC?</a></li>
							<li class="active"><a href="">Info Lowongan</a></li>
							<!-- <li><a href="">Pelamar</a></li>
							<li><a href="">Lowongan</a></li>
							<li class="logout"><a href="" style="color:red">Logout</a></li> -->
						</ul>
						<div class="form-login">
							<h3>LOGIN</h3>
							<form>
								<input type="text" placeholder="Username" required="" id="username">
								<input type="text" placeholder="Password" required="" id="password">
								<p class="login button"> 
									<input type="submit" value="Login" /> 
								</p>
								<p class="daftar">belum punya akun <a href="daftar">Daftar</a></p>
							</form>
						</div>
					</div>
					<div class="contents">

						<div class="content-right">
							<?php echo $content; ?>
							
						</div>
					</div>
				
<?php $this->endContent(); ?>