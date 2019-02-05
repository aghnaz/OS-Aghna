
<?= $this->session->flashdata('pesan'); ?>
<!-- <a href= "#tambah" data-toggle="modal">
<div class="card-header card-header-primary">
  <p  class="card-title ">+ Tambah</p>
</div>
</a> -->
<style>
  .sidebar[data-color="purple"] li.minuman>a {
  	  background-color: #9c27b0;
	  box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
	  /* color: #ffffff; */
	}
	.sidebar .nav li.minuman>a,
	.sidebar .nav li.minuman>a i {
	color: #fff;
	}
</style>

<table id="example" class="table table-hover table-striped">
  <thead class="text-primary">
    <tr>
      <th>No</th>
      <th>Foto Cover</th>
      <th>Nama Minuman</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Aksi <a href="#tambah" data-toggle="modal" class=" btn btn-success" style="margin-left:40%; padding: 4% 3% 4% 3%;  border-radius: 6px; width: 100px;">Tambah</a></th> 
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_minum as $minum):
    $no++; ?>
    <tr>
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$minum->foto_cover )?>" style="width: 40px"></td>
      <td><?= $minum->nama_minum ?></td>
      <td><?= $minum->nama_kategori ?></td>
      <td><?= $minum->harga ?></td>
      <td><?= $minum->stok ?></td>
      <td><a href="#edit" onclick="edit('<?= $minum->id_minum ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/minum/hapus/'.$minum->id_minum)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-titile">Tambah minum</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/minum/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_minum" class="form-control"></td>
            </tr>
            <tr>
              <td>Nama minum</td>
              <td><input type="text" name="nama_minum" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-success">
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
        <h4 class="modal-titile">Edit Minum</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/minum/minum_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_minum_lama" id="id_minum_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_minum" id="id_minum" class="form-control"></td>
            </tr>
            <tr>
              <td>Nama Minuman  <br></td>
              <td><input type="text" name="nama_minum" id="nama_minum" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" id="foto_cover" class="form-control"></td>
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
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/minum/edit_minum/"+a,
      dataType:"json",
      success:function(data){
        $("#id_minum").val(data.id_minum);
        $("#nama_minum").val(data.nama_minum);
        $("#id_kategori").val(data.id_kategori);
        $("#harga").val(data.harga);
        $("#stok").val(data.stok);
        $("#id_minum_lama").val(data.id_minum);
      }
    })
  }
</script>
