<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url(''); ?>img/del.PNG">
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

		@media (max-width: 576px) {
			.hilang {
				display: none;
			}
		}
	</style>
</head>

	<body style="background: url('<?= base_url() ?>img/new.png'); background-size: cover;">
		<div class="container-fluid">
			<section class="row">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<h3 class="text-center" style="margin-top: 40px; margin-bottom: 40px">Login Admin Website Monitoring Ikan Lele</h3>
					<?php if ($this->session->flashdata('error')) {
					?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Login Gagal</strong><br><?= $this->session->flashdata('error'); ?>
						</div>
					<?php
					} ?>
					<form action="<?= base_url(); ?>login_admin" method="post">
						<div class="form-group">
							<label style="font-weight:bold" for="email" text-align="center">Email</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
							<small style="color:red"><?= form_error('email'); ?></small>
						</div>
						<div class="form-group">
							<label style="font-weight:bold" for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
							<small style="color:red"><?= form_error('password'); ?></small>
						</div>
						<button type="submit" id="submit" class="btn btn-block btn-dark" style="background-color: #3E292A">Login</button>
					</form>
					<a href="<?= base_url('/'); ?>">Login sebagai Karyawan</a>
				</div> 
				<div class="col-sm-9 col-md-9 col-lg-9 hilang" style="color: red;font-family: batang; padding-top: 100px;text-align: center;">
					<!-- <h4>Tahun Pelajaran 2019 / 2020</h4> -->
				</div>
			</section>

		</div>
		<div style="position: absolute; bottom: 10px; right: 10px; font-weight: bold; letter-spacing: 2px;font-size: 10pt">
			<p style="background: white; padding: 2px; border-radius: 5px">&copy; 2022. Design By Kelompok PA 3</p>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?= base_url() ?>template/login/js/jquery-3.3.1.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?= base_url() ?>template/login/js/popper.min.js"></script>
		<script src="<?= base_url() ?>template/login/js/bootstrap-4.3.1.js"></script>


	</body>

</html>