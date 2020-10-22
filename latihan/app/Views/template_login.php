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
<div class="wrapper fadeInDown">
  <div class="row">
    <div class="col-12" id="error"></div>
  </div>
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="/img/logo.png" class="my-3" width="30%" alt="User Icon" />
    </div>

      <h4 style="font-weight: bold;">Data UKSW</h4>
    <!-- Login Form -->
    <?php echo $this->renderSection('login');?>
    <?php echo $this->renderSection('verify');?>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<script src="/js/main.js"></script>
</body>
</html>