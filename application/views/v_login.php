<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url(''); ?>img/lele.jpg">
	<title>Website Monitoring Ikan Lele</title>

	<!-- Bootstrap -->

	<link href="<?= base_url() ?>template/login/css/bootstrap-4.3.1.css" rel="stylesheet">
	<style>
		html,
		body {
			height: 100%;
		}

		body {
			background: #EEEEEE;
		}

		/* @media (max-width: 576px) {
			.hilang {
				display: none;
			}
		} */
	</style>
</head>
<center>
	<!-- <div class="p-9"> -->
	<aside class="p-8 col-sm-6">
		<!-- <div class="login-holder shadow p-5 rounded"> -->
		<form action="<?= base_url(); ?>login" method="post">
			<div class="card">
				<article class="card-body">
					<h4 class="card-title text-center mb-4 mt-1">Sign In</h4>
					<hr>
					<center><img style="border-radius: 50%" width="130px" heigth="130px" src="https://doktersehat.com/wp-content/uploads/2020/02/manfaat-ikan-lele-doktersehat.jpg" /></center>
					<div class="form-group">
						<!-- <label style="font-weight:bold" for="email">Email</label> -->
						<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
						<small style="color:red"><?= form_error('email'); ?></small>
					</div>
					<div class="form-group">
						<!-- <label style="font-weight:bold" for="password">Password</label> -->
						<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
						<small style="color:red"><?= form_error('password'); ?></small>
					</div>
					<button type="submit" id="submit" class="btn btn-block btn-dark" style="background-color: #3E292A">Login</button>
		</form>
		</div>
		<p class="text-center danger"><a href="<?= base_url('/login_admin'); ?>" class="btn">Login Sebagai Admin</a></p>
		</form>
		</article>
		</div> <!-- card.// -->
	</aside> <!-- col.// -->
	</div> <!-- row.// -->
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?= base_url() ?>template/login/js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?= base_url() ?>template/login/js/popper.min.js"></script>
	<script src="<?= base_url() ?>template/login/js/bootstrap-4.3.1.js"></script>

	</body>
</center>

</html>