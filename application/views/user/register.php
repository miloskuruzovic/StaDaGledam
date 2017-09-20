<div class="container">
	<div class="row text-center registration-heading">
		<h1>Registracija</h1>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<p>Popunite ispravno sva polja.</p>
		</div>
		<div class="col-sm-6">
			<?= validation_errors(); ?>
			<?= form_open('user/register', array('id' => 'registration-form')) ?>
			<div class="form-group">
				<label for="username">Željeno korisničko ime</label>
				<input id="username" name="username" class="form-control" type="text" required >		
			</div>
			<div class="form-group">
				<label for='email'>Email</label>
				<input id="email" name="email" class="form-control" type="text" required >
			</div>				
			<div class="form-group">
				<label for="password">Lozinka</label>
				<input id="password" name="password" class="form-control" type="password" required >		
			</div>
			<div class="form-group">
				<label for="confirm-password">Ponovi lozinku</label>
				<input id="confirm-password" name="confirm-password" class="form-control" type="password" required >		
			</div>
			<div class="form-group">
				<input class='btn btn-default' type="submit" name="submit" value="Registruj se" id="submit" />
			</div>	
			</form>
		</div>
		<div class="col-sm-3 validation">
			<p id="validation-username"></p>
			<p id="validation-email"></p>
			<p id="validation-password"></p>
		</div>
	</div>
</div>
<script>
$(function(){
	
	var users;

	$.getJSON("<?= base_url().'user/usersJson' ?>", function(result){
			users = result;
		});

	$("#username").focusout(function(){
		var username = $('#username').val();
		$.each(users, function(index, user){
			if (username == user.username) {
				$('#validation-username')
				.html("Korisnik sa ovim imenom već postoji!")
				.removeClass("bg-primary")
				.addClass("bg-danger");

				return false;
			}else{
				$('#validation-username')
				.html("Korisničko ime je dostupno!")
				.removeClass("bg-danger")
				.addClass("bg-primary");
			}
		});
	});

	$("#email").focusout(function(){
		var email = $('#email').val();
		$.each(users, function(index, user){
			if (email == user.email) {
				$('#validation-email')
				.html("Korisnik sa ovom email adresom već postoji.")
				.removeClass("bg-primary")
				.addClass("bg-danger");

				return false;
			}else{
				$('#validation-email')
				.html("Email je dostupan!")
				.removeClass("bg-danger")
				.addClass("bg-primary");
			}
		});
	});

	$("#password, #confirm-password").focusout(function(){
		var password = $("#password").val();
		var confirm_password = $("#confirm-password").val();

		if (password == confirm_password) {
			$('#validation-password')
			.html("Lozinke se poklapaju!")
			.removeClass("bg-danger")
			.addClass("bg-primary");
		}else{
			$('#validation-password')
			.html("Lozinke se ne poklapaju!")
			.removeClass("bg-primary")
			.addClass("bg-danger");
		}
	});

	$('html').mousemove(function(){
		var i = $(".validation").children('.bg-primary').length;
		(i == 3)?
		$("#submit").removeClass("disabled")
		:
		$("#submit").addClass("disabled");
	});
});
</script>