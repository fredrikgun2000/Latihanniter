<!DOCTYPE html>
<html>
<head>
	<title>Data UKSW</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="/">
    <img src="/img/logo.png" width="35" height="35" class="d-inline-block align-top" alt="">
    Satya Wacana
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Dasboard</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search">
    </div>
	    <div class="dropleft">
		    <span id="session_nama" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class=""></span>
		     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <span id="logout" class="dropdown-item text-danger">Logout</span>
			    
			  </div>
	    </div>
  </div>
</nav>

<?php echo $this->renderSection('dashboard');?>
<?php echo $this->renderSection('dashboard_mahasiswa');?>

<script src="/js/main.js"></script>
</body>
</html>