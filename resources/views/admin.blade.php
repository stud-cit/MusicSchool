<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin</title>
	 @include('layouts.admin.styles')
</head>

<body>
	<div id="admin">
		@include('layouts.admin.nav')

		<!-- content -->
		<div class="content-wrapper">
			<div class="container">
				<router-view></router-view>
			</div>
		</div>
		
		<!-- content footer -->
		@include('layouts.admin.footer')

	</div>

	<!-- js -->
	<script src="{{ asset('js/admin.js') }}"></script>

</body>

</html>
