<div class="content-wrapper container">
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="flashdata" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
    <?php endif; ?>
    <div class="page-heading d-flex justify-content-between">
        <h4><?= $title; ?></h4>
        <a href="<?= base_url('addPl'); ?>" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama STNK</th>
                                    <th>Alamat STNK</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $d) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td><?= $d['nama_stnk']; ?></td>
                                        <td><?= $d['alamat_stnk']; ?></td>
                                        <td class="text-center"><?= $d['jenis_kendaraan']; ?></td>
                                        <td class="text-center"><?= $d['status']; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-warning detail" data-id="<?= $d['id_pl']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</button>
                                            <a href="<?= base_url('edPl/' . $d['id_pl']); ?>" class="btn btn-success">Edit</a>
                                            <a href="" class="btn btn-danger delete" data-id="<?= $d['id_pl']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_stnk">Nama STNK</label>
                                <input type="text" id="nama_stnk" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="alamat_stnk">Alamat STNK</label>
                                <input type="text" id="alamat_stnk" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <input type="text" id="jenis_kendaraan" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nomor_rangka">Nomor Rangka</label>
                                <input type="text" id="nomor_rangka" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- sweatalert -->
<!-- datatables -->
<script src="<?= base_url('assets/template'); ?>/vendors/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var flash = $('.flashdata').data('flash');
    if (flash == 'success') {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil ditambahkan',
            showConfirmButton: false,
            timer: 1500
        })
    }

    // show detail
    $('.detail').click(function() {
        var id = $(this).data('id')
        $.ajax({
            url: 'detailPl',
            method: 'POST',
            data: {
                id: id
            },
            success: function(res) {
                const data = JSON.parse(res)
                $('#nama_stnk').val(data.nama_stnk)
                $('#alamat_stnk').val(data.alamat_stnk)
                $('#jenis_kendaraan').val(data.jenis_kendaraan)
                $('#type_kendaraan').val(data.type_kendaraan)
                $('#nomor_mesin').val(data.nomor_mesin)
                $('#nomor_rangka').val(data.nomor_rangka)
                $('#status').val(data.status)
            }
        })
    })

    // hapus
    $('.delete').click(function(e) {
        e.preventDefault()
        var href = $('.delete').attr('href');
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data akan terhapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delPl',
                    type: 'POST',
                    data: {
                        id: id,
                    },
                    success: function(res) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                })
            }
        })
    })
</script>