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
    <span id="session_nama"></span>
  </div>
</nav>
<div class="container-fluid py-2" style="background-color: #eeeeee; min-height: 600px;">
	<div id="errors"></div>
	<form id="post" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-11 mx-auto p-3" style="background-color: white;border-radius: 10px;">
				<div class="row my-2">
					<div class="col-lg-6">
						<label>NIM</label>
						<input type="number" class="form-control" name="nim">
					</div>
					<div class="col-lg-6">
						<label>Nama Mahasiswa</label>
						<input type="text" class="form-control" name="nama">
					</div>
				</div>
				<div class="row my-2">
					<div class="col-lg-6">
						<label>email</label>
						<input type="email" id="email" class="form-control" name="email" placeholder="cukup input nama email student anda ...">
					</div>
					<div class="col-lg-6">
						<label>Foto Mahasiswa</label>
						<input type="file" class="form-control" name="foto">
					</div>
				</div>
				<div class="row my-2">
					<div class="col-lg-2 mx-auto">
						<button type="submit" class="btn btn-danger form-control">Kirim</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div class="row my-2">
		<div class="col-lg-12">
			<div class="row d-flex justify-content-center" id="load" style="max-height: 500px; overflow-y: scroll;"></div>
	</div>
</div>

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       	<form id="update" method="post" enctype="multipart/form-data">
      <div class="modal-body">
			<div class="row">
				<div class="col-lg-11 mx-auto p-3" style="background-color: white;border-radius: 10px;">
					<div class="row my-2">
						<div class="col-lg-6">
							<input type="hidden" class="form-control" name="editid" id="editid">
							<label>NIM</label>
							<input type="number" class="form-control" name="editnim" id="editnim">
						</div>
						<div class="col-lg-6">
							<label>Nama Mahasiswa</label>
							<input type="text" class="form-control" name="editnama" id="editnama">
						</div>
					</div>
					<div class="row my-2">
						<div class="col-lg-6">
							<label>email</label>
							<input type="email" class="form-control" name="editemail" id="editemail" placeholder="cukup input nama email student anda ...">
						</div>
						<div class="col-lg-6">
							<label>Foto Mahasiswa</label>
							<div class="row">
								<div class="col-lg-12">
									<img id="reviewfoto" width="100" class="my-1">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<span id="reviewfotonama"></span>
								</div>
							</div>
							<input type="file" class="form-control" name="editfoto">
						</div>
					</div>
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update changes</button>
      </div>
		</form>
    </div>
  </div>
</div>

<script src="/js/main.js"></script>
</body>
</html>