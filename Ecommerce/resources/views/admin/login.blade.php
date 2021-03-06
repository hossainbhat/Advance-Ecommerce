<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('backEnd/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('backEnd/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backEnd/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backEnd/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('backEnd/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('backEnd/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('backEnd/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('backEnd/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('backEnd/css/icons.css')}}" rel="stylesheet">
	<title>Online StoreBD | Login</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{asset('front/images/logo_email.png')}}" width="180" alt="" />
						</div>
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
									</div>
									<div class="form-body">
									

										@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
										@if(Session::has('error_message'))
											<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
												<div class="text-white">{{Session::get('error_message')}}</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										@endif
										@if(Session::has('success_message'))
											<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
												<div class="text-white">{{Session::get('success_message')}}</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										@endif
										<form class="row g-3" action="{{url('/admin')}}" method="post" autocomplete="off">
										@csrf
											<div class="col-12">
												<label for="email" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="password" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" name="remember_token" type="checkbox" id="remember_token" {{ old('remember_token') ? 'checked' : '' }}>
													<label class="form-check-label" for="remember_token">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="{{url('admin/forgot-password')}}">Forgot Password ?</a>

											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('backEnd/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('backEnd/js/jquery.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
</body>
</html>