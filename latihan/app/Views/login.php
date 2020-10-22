<?php echo $this->extend('template_login');?>

<?php echo $this->section('login');?>
<form id="LoginPost" method="POST">
  <div class="row">
    <div class="col-12">
      <input type="text" id="login" class="fadeIn second form-control" name="email" placeholder="Email Student" required>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Passoword" required>
    </div>
  </div>
  <input type="submit" class=" btn btn-danger fadeIn fourth" value="Log In">
</form>
<?php echo $this->endSection();?>