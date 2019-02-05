<style>
	.sidebar[data-color="purple"] li.history>a {
  	  background-color: #9c27b0;
	  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
	  /* color: #ffffff; */
	}
	.sidebar .nav li.history>a,
	.sidebar .nav li.history>a i {
	color: #fff;
	}
</style>

<h2 align="center">Histori Pesanan</h2>
<?= $this->session->flashdata('pesan'); ?>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>No. Nota</td>
			<td>Nama Pembeli</td>
			<td>Tanggal Beli</td>
			<td>Grand Total</td>
			<!-- <td>Detail</td> -->
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach($tampil_pesanan as $psn):
		$no++; ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $psn->id_transaksi ?></td>
			<td><?= $psn->nama_pembeli ?></td>
			<td><?= $psn->tanggal_beli ?></td>
			<td><?= $psn->total ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
