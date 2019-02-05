<style>
	.grid{
		display: grid;
		grid-template-columns: 50% 50%;
	}
	.grid2{
		display: grid;
		grid-template-columns: 25% 75%;
	}
	.sidebar[data-color="purple"] li.transaksi>a {
  	  background-color: #9c27b0;
	  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
	  /* color: #ffffff; */
	}
	.sidebar .nav li.transaksi>a,
	.sidebar .nav li.transaksi>a i {
	color: #fff;
	}
</style>
<div class="card card-stats" style="margin-top: -2%; margin-bottom: -2%">
<!-- <br><br><h2 align="center">Halaman Transaksi</h2> <br><br> -->
<div class="grid">
<div class="col-md-6">
	<table id="example" class="table table-hover table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama minuman</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach($tampil_minum as $minum): $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$minum->nama_minum?></td>
				<td><?=$minum->harga?></td>
				<td><?=$minum->stok?></td>
				<td><?=$minum->nama_kategori?></td>
				<?php if($minum->stok>0): ?>
				<td><a href="<?=base_url('index.php/transaksi/addcart/'.$minum->id_minum)?>" class="btn btn-info">Pesan</a></td>
			<?php elseif($minum->stok==0): ?>
				<td><button type="button" class="btn btn-danger" data-toggle="popover" data-content="Stok habis, segera hubungi admin?">Habis</button></td>
			<?php endif ?>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="col-md-6">
	<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post" style="width:30em;">
		<div class="grid2">
			<div>
				<a href="<?=base_url('index.php/transaksi/clearcart')?>" class="btn btn-danger" style="padding: 10% 5% 10% 5%; margin-top:15%;">Clear Cart</a>
			</div>
			<div>
				Nama Pembeli : <input type="text" name="nama_pembeli" class="form-control" style="display: inline-block;"><br>
			</div>
		</div>
		<input type="hidden" name="id_user" class="form-control" value="<?= $this->session->userdata('id_user'); ?>" style="display: inline-block;"><br>
		<table class="table table-striped table-hover" blocked>
			<tr>
				<th>No</th>
				<th>Nama Minuman</th>
				<th>QTY</th>
				<th>Harga</th>
				<th>Subtotal</th>
				<th>Aksi</th>
			</tr>
				<?php $no=0; foreach($this->cart->contents() as $items): $no++; ?>
				<input type="hidden" name="id_minum[]" value="<?=$items['id']?>">
				<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">
			<tr>
				<td><?=$no?></td>
				<td><?=$items['name']?></td>
				<td width="2"><input type="number" required name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding: 4px;width: 47px"></td>
				<td><?=number_format($items['price'])?></td>
				<td><?=number_format($items['subtotal'])?></td>
				<td><a href="<?=base_url('index.php/transaksi/hapus_cart/'.$items['rowid'])?>" class="btn btn-danger" style="padding: 10% 30% 10% 30%;">&times;</a></td>
			</tr>
			<?php endforeach ?>
			<input type="hidden" name="total" value="<?=$this->cart->total()?>">
			<tr style="border-bottom:5px black solid">
				<th colspan="4">Grandtotal</th>
				<th><?= number_format($this->cart->total()) ?></th>
				<th></th>
			</tr>
			<tr>
				<th colspan="3">Bayar</th>
				<th colspan="2"><input type="number" name="uang_bayar" class="form-control" style="display: inline-block;width:150px"></th>
				<th></th>
			</tr>
		</table>
		<input type="submit" name="update" class="btn btn-success" value="Update QTY"> 
		<input required type="submit" name="bayar" onclick="return confirm('Are you sure?')" class="btn btn-warning" value="Bayar">
	</form>
<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan'); ?></div>
<?php endif ?>
</div>
</div>