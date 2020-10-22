$(document).ready(function(){
	CheckSession();
	LoadData();
})

$(document).on('submit','#LoginPost',function(e){
		e.preventDefault();
		$.ajax({
		url:'http://localhost:5000/LoginPost',
		method:'POST',
		data:new FormData(this),
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			if (typeof data.response==="undefined") {
				$('.alert').remove();
				sessionStorage.setItem('role', data.role);
				sessionStorage.setItem('nama', data.nama);
				sessionStorage.setItem('foto', data.foto);
				if (data.verify_token=='kosong') {
					alert('verify');
				}else if(data.verify_token=='konfirmasi'){
					if (data.role=='admin') {
						window.location.href = "http://localhost:8080/Admin";
					}else if (data.role=='mahasiswa') {
						alert('hai mahasiswa');
					}
				}else{
					alert('verify');
				}
				
			}else{
				$('#error').append('<div class="alert alert-danger">'+data.response+'</div>');
			}
		}
	})
})


$(document).on('submit','#post',function(e){
		e.preventDefault();
		$.ajax({
		url:'http://localhost:5000/Post',
		method:'POST',
		data:new FormData(this),
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			LoadData();
			$('input').val('');
		}
	})
})


$(document).on('submit','#update',function(e){
		e.preventDefault();
		$.ajax({
		url:'http://localhost:5000/Update',
		method:'POST',
		data:new FormData(this),
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			$('#editmodal').modal('hide');
			LoadData();
			$('input').val('');
		}
	})
})

$(document).on('click','.delete',function(){
	var id=$(this).attr('id');
	$.ajax({
		url:'http://localhost:5000/Delete',
		data:'id='+id,
		method:'GET',
		success:function(data){
			LoadData();
		}
	})
})

$(document).on('click','.edit',function(){
	var id=$(this).attr('id');
	$.ajax({
		url:'http://localhost:5000/Edit',
		data:'id='+id,
		method:'GET',
		success:function(data){
			$('#editid').val(data.id);
			$('#editnim').val(data.nim);
			$('#editnama').val(data.nama);
			$('#editemail').val(data.email);
			$('#reviewfoto').attr('src','/img/'+data.foto);
			$('#reviewfotonama').html(data.foto);
		}
	})
})

function CheckSession() {
	var getSnama=sessionStorage.getItem('nama');
	$('#session_nama').html('hai '+'<b>'+getSnama+'</b>');
}

function LoadData() {
	$('.card').remove()
	$.ajax({
		url:'http://localhost:5000/Load',
		method:'GET',
		success:function(data){
			$.each(data,function(i,item){
                $('#load').append('<div class="card fadeIn mx-3 my-2 px-2" style="width: 18rem;"><img class="card-img-top my-2" style="border-radius:10px" src="/img/'+item.foto+'" alt="Card image cap"><div class="card-body"><h5 class="card-title"><b>'+item.nama+'</b></h5><p class="card-text"><b>NIM : </b>'+item.nim+'<br><b>Email : </b>'+item.email+'</p><div class="row"><div class="col-lg-12 text-right"><button class="btn btn-success mx-1 edit" id="'+item.id+'" data-toggle="modal" data-target="#editmodal">Edit</button><button class="btn btn-danger mx-1 delete" id="'+item.id+'">Delete</button></div></div></div>');
            });
		}
	})
}

$(document).on('keyup','#search',function(){
	$('.card').remove();
	var search=$('#search').val();
	if (search!='') {
		$.ajax({
			url:'http://localhost:5000/Search',
			data:'search='+search,
			method:'GET',
			success:function(data){
				$.each(data,function(i,item){
	                $('#load').append('<div class="card mx-3 my-2 px-2 fadeIn" style="width: 18rem;"><img class="card-img-top my-2" style="border-radius:10px" src="/img/'+item.foto+'" alt="Card image cap"><div class="card-body"><h5 class="card-title"><b>'+item.nama+'</b></h5><p class="card-text"><b>NIM : </b>'+item.nim+'<br><b>Email : </b>'+item.email+'</p><div class="row"><div class="col-lg-12 text-right"><button class="btn btn-success mx-1 edit" id="'+item.id+'" data-toggle="modal" data-target="#editmodal">Edit</button><button class="btn btn-danger mx-1 delete" id="'+item.id+'">Delete</button></div></div></div>');
	            });
			}
		})
	}else{
		LoadData();
	}
})