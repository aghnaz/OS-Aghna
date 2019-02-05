<style>
	.sidebar[data-color="purple"] li.toko>a {
  	  background-color: #9c27b0;
	  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
	  /* color: #ffffff; */
	}
	.sidebar .nav li.toko>a,
	.sidebar .nav li.toko>a i {
	color: #fff;
	}
	.fill{
		width:30%;
	}
</style>
<div class="container" style="background-color:white;">
    <h4>Daftar Minuman yang Tersedia</h4>
</div>
<div>
	<?php foreach($tampil_minum as $tb):?>
	<div>
		<div>
			<img src="<?=base_url('assets/img/')?><?=$tb->foto_cover?>">
		</div>
		<div>
			<h4><?=$tb->nama_minum?></h4>
		</div>
		<div>
			<p><i class="fa fa-pie-chart"></i> Stok Minuman = <?=$tb->stok?> </p>
		</div>
		<div>
			<h5><?="Rp. ".number_format($tb->harga,0,",",".")?></h5>
		</div>
    </div>
    <?php endforeach ?>
</div>