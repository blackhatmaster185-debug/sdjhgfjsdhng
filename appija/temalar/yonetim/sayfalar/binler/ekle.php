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
            <li class="breadcrumb-item">Bin Ekle</li>
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
                <h5>Bin Ekle</h5>
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
            <form class="ajaxForm" action="<?= admin_url('binler/ekle') ?>">
              <div class="form theme-form">

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Bin</label>
                      <input name="bin" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label>Banka Adı (diğerleriyle aynı olmak zorundadır)</label>
                      <input name="banka_adi" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>type</label>
                      <input name="type" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>sub_type</label>
                      <input name="sub_type" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Durum</label>
                      <select name="status" class="form-select">
                        <option value="1">Aktif</option>
                        <option value="0">Pasif</option>
                        <option value="banli">Banla</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col mt-4">
                    <div class="form-group mb-0 text-center">
                      <button class="btn btn-primary mr-3" type="submit"> <i class="fa fa-plus"></i> Ekle</button>
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