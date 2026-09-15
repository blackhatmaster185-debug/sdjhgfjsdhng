<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= admin_url() ?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Ayarlar</li>
                        <li class="breadcrumb-item">Ayarlar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h5>Ayarlar</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="ajaxForm" method="post" action="<?= admin_url('ayarlar') ?>">

                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="site_baslik">Title</label>
                                            <input id="site_baslik" name="site_baslik" value="<?= siteayar()->site_baslik ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="site_footer">Footer</label>
                                            <input id="site_footer" name="site_footer" value="<?= siteayar()->site_footer ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Site Durumu</label>
                                            <select name="site_durum" class="form-select">
                                                <option value="1" <?= siteayar()->site_durum == "1" ? 'selected' : '' ?>>Açık</option>
                                                <option value="0" <?= siteayar()->site_durum == "0" ? 'selected' : '' ?>>Kapalı</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Robot Doğrulaması</label>
                                            <select name="robot_dogrulamasi" class="form-select">
                                                <option value="1" <?= siteayar()->robot_dogrulamasi == "1" ? 'selected' : '' ?>>Aktif</option>
                                                <option value="0" <?= siteayar()->robot_dogrulamasi == "0" ? 'selected' : '' ?>>Pasif</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>

                            <div class="row">
                                <div class="col mt-2">
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary mr-3" type="submit"> <i class="fa fa-save"></i> Ayarları Kaydet</button>
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