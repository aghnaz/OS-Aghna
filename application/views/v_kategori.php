<style>
	.sidebar[data-color="purple"] li.kategori>a {
  	  background-color: #9c27b0;
	  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
	  /* color: #ffffff; */
	}
	.sidebar .nav li.kategori>a,
	.sidebar .nav li.kategori>a i {
	color: #fff;
	}
</style>
<div class="card card-stats">
<!-- <center><a href="#tambah" data-toggle="modal" class="btn btn-success">Tambah</a></center> -->
<table id="tmbh" class="table table-hover table-stripped">
	<thead>
		<tr class="text-primary">
			<th>NO</th>
			<th>ID Kategori</th>
			<th>Nama Kategori</th>
			<th>Aksi <a href="#tambah" data-toggle="modal" class="btn btn-success" style="margin-left:55%">Tambah</a></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 0;foreach ($tampil_kategori as $kat):
			$no++;?>
		<tr>
			<td><?= $no?></td>
			<td><?=$kat->id_kategori?></td>
			<td><?=$kat->nama_kategori?></td>
			<td>
				<a href="#edit" onclick="edit('<?=$kat->id_kategori?>')" data-toggle="modal" class="btn btn-primary">
					Ubah
				</a>
				<a href="<?=base_url('index.php/kategori/hapus/'.$kat->id_kategori)?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">
					Hapus
				</a>
			</td>
		</tr>
	<?php endforeach?>
	<?php
    if($this->session->flashdata('pesan')!= null){
      echo"<div class='alert alert-success' style='width:500px'>".$this->session->flashdata('pesan')."</div";
       }?>
	</tbody>
</table>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-titile">Tambah Kategori</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<div class="modal-body"> 
			<form action="<?=base_url('index.php/kategori/tambah')?>" method="post">
				<table>
					<tr>
						<td>Nama Kategori <br></td>
						<td><input type="text" name="nama_kategori" required class="form-control"></td>
					</tr>
				</table>
				<br>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="edit">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-titile">Edit Kategori</h4>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/kategori/kategori_update')?>" method="post">
				<input type="hidden" name="id_kategori_lama" id="id_kategori_lama">
				<table>
				<tr>
					
					<td><input type="hidden" name="id_kategori" id="id_kategori" required class="form-control">
					</td>
				</tr>
				<tr>
					<td>Nama Kategori <br></td>
					<td>
					<input type="text" id="nama_kategori" name="nama_kategori" required class="form-control">
					</td>
				</tr>
				</table>
				<input type="submit" name="edit" value="Simpan" class="btn btn-success">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tmbh').DataTable();
	});
</script>
<script type="text/javascript">
	function edit(a){
		$.ajax({
			type:"post",
		url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,dataType:"json",
		success:function(data){
			$("#id_kategori").val(data.id_kategori);
			$("#nama_kategori").val(data.nama_kategori);
			$("#id_kategori_lama").val(data.id_kategori);
		}
		});
	}
</script>