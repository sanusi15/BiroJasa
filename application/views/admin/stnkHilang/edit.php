<div class="content-wrapper container">

    <div class="page-content">
        <section class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Masukan Data</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?= base_url('svPl'); ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_stnk">Nama STNK</label>
                                            <input type="text" id="nama_stnk" class="form-control <?= form_error('nama_stnk') ? 'is-invalid' : ''; ?>" autofocus name="nama_stnk">
                                            <?php if (form_error('nama_stnk')) : ?>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= form_error('nama_stnk') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat_stnk">Alamat STNK</label>
                                            <input type="text" id="alamat_stnk" class="form-control <?= form_error('alamat_stnk') ? 'is-invalid' : ''; ?>" name="alamat_stnk">
                                            <?php if (form_error('alamat_stnk')) : ?>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= form_error('alamat_stnk') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Jenis Kendaraan</label>
                                            <select class="form-select <?= form_error('jenis_kendaraan') ? 'is-invalid' : ''; ?>" name="jenis_kendaraan" id="">
                                                <option value="mobil">Mobil</option>
                                                <option value="motor">Motor</option>
                                            </select>
                                            <?php if (form_error('jenis_kendaraan')) : ?>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= form_error('jenis_kendaraan') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="type_kendaraan">Tipe Kendaraan</label>
                                            <input type="text" id="type_kendaraan" class="form-control <?= form_error('type_kendaraan') ? 'is-invalid' : ''; ?>" name="type_kendaraan">
                                            <?php if (form_error('type_kendaraan')) : ?>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= form_error('type_kendaraan') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nomor_mesin">Nomor Mesin</label>
                                            <input type="text" id="nomor_mesin" class="form-control <?= form_error('nomor_mesin') ? 'is-invalid' : ''; ?>" name="nomor_mesin">
                                            <?php if (form_error('nomor_mesin')) : ?>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= form_error('nomor_mesin') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nomor_rangka">Nomor Rangka</label>
                                            <input type="text" id="nomor_rangka" class="form-control <?= form_error('nomor_rangka') ? 'is-invalid' : ''; ?>" name="nomor_rangka">
                                            <?php if (form_error('nomor_rangka')) : ?>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= form_error('nomor_rangka') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="<?= base_url('pl'); ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>