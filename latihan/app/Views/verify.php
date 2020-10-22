<?php echo $this->extend('template_login');?>

<?php echo $this->section('verify');?>
<input type="hidden" value="verify" id="pagination">
<p class="px-2">Sistem dari Data UKSW telah mengirimkan email yang berisikan token untuk memverifikasi akun anda. silahkan periksa email <b id="emailverify"></b></p>
<form id="verifypost" method="POST" class="px-2">
  <input type="hidden" id="emailverify_input" name="email">
  <div class="row">
    <div class="col-2">
      <input type="text" class="fadeIn second form-control" maxlength="1" name="t1" required>
    </div>
    <div class="col-2">
      <input type="text" class="fadeIn second form-control" maxlength="1" name="t2" required>
    </div>
    <div class="col-2">
      <input type="text" class="fadeIn second form-control" maxlength="1" name="t3" required>
    </div>
    <div class="col-2">
      <input type="text" class="fadeIn second form-control" maxlength="1" name="t4" required>
    </div>
    <div class="col-2">
      <input type="text" class="fadeIn second form-control" maxlength="1" name="t5" required>
    </div>
    <div class="col-2">
      <input type="text" class="fadeIn second form-control" maxlength="1" name="t6" required>
    </div>
  </div>
  <input type="submit" class=" btn btn-danger fadeIn fourth" value="Send Token">
</form>
<?php echo $this->endSection();?>