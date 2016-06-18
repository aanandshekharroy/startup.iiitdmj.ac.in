<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum</title>
	<link rel="icon" type="image/png" href="/assets/bootstrap/img/logo.png" />
    <link rel="icon" type="image/png" href="/assets/bootstrap/img/smallLogo.png" />
    <link href="/css/group_layout.css" rel="stylesheet">
    <link href="/css/sidebar_js.css" rel="stylesheet"/>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/bootstrap/css/font-awesome.min.css">
	<script src="/js/jquery-1.12.0.min.js"></script>
    <!-- // <script src="/assets/bootstrap/js/recommendedGroups.js"></script> -->
    <script src="/js/typeahead.min.js"></script>   
</head>
<body style="background-color: #F9F9F9">
    <div class="container">
    	<div class="row center-block">
    		<div class="col-sm-9 col-md-9 col-xs-11 content" style="border:1px solid grey;margin-right:30px;background-color: white;">
    			@yield('content')
    		</div>
    		<div class="col-sm-2 col-md-2 right-menu center-block pull-right hidden-xs" id="recomendation_sidebar">
                <ul class="sidebar-nav2" id="recommendations-menu-bar">
                    @yield('right-menu-bar')
                </ul>
    		</div>	
    	</div>
    </div>
    <script src="/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
