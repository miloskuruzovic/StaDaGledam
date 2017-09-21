<div class="container">
	<div class="row">
		<nav class="navbar navbar-fixed-top container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="<?= base_url() ?>">Šta da gledam</a>
			</div>
			<div id="myNavbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav ">
				<li><a href="<?= base_url() ?>blog/posts">Svi postovi</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">	
			<?php if (isset($_SESSION['user_id'])): ?>
				<li>
					<a href="<?= base_url() ?>user/profile/<?= $_SESSION['user_id'] ?>">
						<?= $_SESSION['username'] ?>
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>user/logout">Izlogujte se</a>
				</li>
			<?php else: ?>
				<li>
					<a href="#" data-toggle="modal" data-target="#loginModal">
					Ulogujte se!
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>user/register">Nemate nalog?</a>
				</li>	
			<?php endif ?>
    		</ul>
    		</div>
		</nav>
	</div>
<!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Uloguj se!</h4>
		</div>
		<div class="modal-body">
			<?= form_open(base_url().'user/login') ?>
			<div class="form">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="text" class="form-control" name="email" placeholder="Email">
						</div>
						<br>
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" name="password" placeholder="Password">
						</div>
				</div>
				<hr>
				<div class="input-group">
					<input class='btn btn-default' type="submit" name="submit" value="Login" />
				</div>
			</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
<!-- end of modal -->
</div>
