<div class="page-body">
  <div class="container-fluid contyapi">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= admin_url() ?>"> <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Banlar</li>
            <li class="breadcrumb-item">IP Banla</li>
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
                <h5>IP Banla</h5>
              </div>
              <div class="col-sm-8">
                <div class="text-sm-end">
                  <a href="<?= admin_url('banlar') ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-list"></i> Banlar
                  </a>
                  <a href="<?= admin_url('banlar/ekle') ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> IP Banla
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="ajaxForm" action="<?= admin_url('banlar/ekle') ?>">
              <div class="form theme-form">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>IP</label>
                      <input name="ip" class="form-control" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Neden</label>
                      <input name="neden" class="form-control" type="text" value="">
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