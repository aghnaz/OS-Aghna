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
	div.gallery {
		margin: 5px;
		border: 1px solid #ccc;
		float: left;
		width: 168px;
		padding: 1.2%;
		height: 300px;
	}

	div.gallery:hover {
		border: 3px solid purple;
	}

	div.gallery img {
		width: 100%;
		height: auto;
		text-align: center;
	}

	div.desc {
		position: absolute;
		/* bottom: 20px; */
		/* margin-bottom: 10px; */
	    text-align: left;
	}
</style>
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Daftar Minuman yang Tersedia</h4>
    </div>
    <div class="card-body">
		<div>
		<?php foreach($tampil_minum as $tb):?>
		<div class="gallery" text>
			<div>
				<img src="<?=base_url('assets/img/')?><?=$tb->foto_cover?>" width="160" height="160">
			</div>
			<div class="desc">
				<div>
					<h4 style="margin-top: 8%;"><?=$tb->nama_minum?></h4>
				</div>
				<div>
					<p><i class="fa fa-pie-chart"></i> Stok tersedia = <?=$tb->stok?> </p>
				</div>
				<div>
					<h5><b><?="Rp. ".number_format($tb->harga,0,",",".")?></b></h5>
				</div>
			</div>
		</div>
		<?php endforeach ?>
		</div>
	</div>
</div>