 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Startup India Centre at the Institute</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forum</title>
    <link href="/css/group_layout.css" rel="stylesheet">
    <link href="/css/sidebar_js.css" rel="stylesheet"/>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <script src="/js/jquery-1.12.0.min.js"></script>
    <!-- // <script src="/assets/bootstrap/js/recommendedGroups.js"></script> -->
    <script src="/js/typeahead.min.js"></script>
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="/images/favicon.ico" />
  <!-- <script type="text/javascript" src="/js/cufon-yui.js"></script> -->
  <!-- <script type="text/javascript" src="/js/arial.js"></script>-->
  <!-- <script type="text/javascript" src="/js/cuf_run.js"></script>-->
  <script type="text/javascript">window.onerror = function(){return true;};</script>
  <!-- Copy to the head section of your webpage -->
  <script type="text/javascript" src="/js/mhslideshow.js"></script>
  <script type="text/javascript" src="/js/initblinds.js"></script>
  <link rel="stylesheet" href="/js/mhslideshow.css" type="text/css" />
<link href="/css/mystyle.css" rel="stylesheet">
</head>

<body>
@if(Auth::check())
  @if(Auth::user()->isAdmin)

    <div class="row">
      <div class="col-sm-offset-10">
        <a href="/dashboard" class="btn btn-info" role="button">Dashboard</a> <a href="/logout" class="btn btn-info" role="button">Logout</a> 
      </div>
    </div>

  @endif
@endif
  <div class="main">
    <div class="header">
      <div class="header_resize" align="center">
        <img src="/images/logo.jpg" />
        <div class="clr"></div>
      </div>
    </div>
    <div class="header1">
      <div class="header_resize1">
        <div class="menu_nav" >
         <ul style="padding-left:40px;">
            <li ><a href="/">Home </a></li>
            <li><a href="#">Business Incubator</a></li>
            <li><a href="/facility">Facilities   </a></li>
            <li><a href="/tax-benefits">Tax Benefits </a></li>
            <li><a href="#">Information </a></li>
            <li><a href="/contact">Contact Us </a></li>
            <li><a href="/forum">Forum</a></li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
    </div>

    @yield('slideshow')

    <div class="container">
      @yield('content')    
      @yield('submitPost') 
    </div>
  
    <div class="fbg">
      <div class="fbg_resize">  
        <div class="footer">
          <div class="footer_resize">
            <p class="lf">&copy; Copyright <a href="http://startup.iiitdmj.ac.in/"> startup.iiitdmj.ac.in</a><br /></p>
            <p class="rf">Designed by: <a href="mailto:tabish@iiitdmj.ac.in">Tabish</a></p>
            <div class="clr"></div>
          </div>
        </div>
        <h2><span>&nbsp;</span></h2>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>






