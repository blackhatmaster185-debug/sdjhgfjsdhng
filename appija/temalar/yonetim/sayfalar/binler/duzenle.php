<div class="page-body">
    <div class="container-fluid contyapi">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= admin_url() ?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Binler</li>
                        <li class="breadcrumb-item">Bin Düzenle</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid contyapi">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h5>Bin Düzenle</h5>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="<?= admin_url('binler') ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-list"></i> Binler
                                    </a>
                                    <a href="<?= admin_url('binler/ekle') ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Bin Ekle
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="ajaxForm" action="<?= admin_url('binler/duzenle/' . $bin->id) ?>">
                            <div class="form theme-form">
                                <div class="row">
                                    <?php $logo_name = url_title(convert_accented_characters($bin->banka_adi), '-', TRUE) . '.png'; ?>
                                    <div style="padding-bottom:20px"><img style="width:150px" src="/public/bank/<?= $logo_name ?>" alt="public/bank/<?= $logo_name ?>"></div>


                                    Eğer bu bankanın logosu kayıtlı değil ise logoyu <span class="text-primary"><?= base_url('public/bank/') ?></span>
                                    dizinine <span class="text-primary"><?= $logo_name ?></span> adı ile yükleyin. (banka adı değiştirirseniz bu logo name değişecektir.)
                                    <br><br>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bin</label>
                                            <input name="bin" class="form-control" type="text" value="<?= $bin->bin ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Banka Adı (diğerleriyle aynı olmak zorundadır)</label>
                                            <input name="banka_adi" class="form-control" type="text" value="<?= $bin->banka_adi ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>type</label>
                                            <input name="type" class="form-control" type="text" value="<?= $bin->type ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>sub_type</label>
                                            <input name="sub_type" class="form-control" type="text" value="<?= $bin->sub_type ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Durum</label>
                                            <select name="status" class="form-select">
                                                <option value="1" <?= $bin->status == "1" ? 'selected' : '' ?>>Aktif</option>
                                                <option value="0" <?= $bin->status == "0" ? 'selected' : '' ?>>Pasif</option>
                                                <option value="banli" <?= $bin->status == "banli" ? 'selected' : '' ?>>Banla</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-4">
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary mr-3" type="submit"> <i class="fa fa-save"></i> Düzenle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>