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
	<title>Everywarebd | Forgot Password</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Reset Email</h3>
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
										<form class="row g-3" action="{{url('/admin/forgot-password')}}" method="post" autocomplete="off">
										@csrf
											<div class="col-12">
												<label for="email" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
											</div>
										
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Reset</button>
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

</body>
</html>