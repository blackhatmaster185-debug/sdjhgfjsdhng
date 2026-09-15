<div class="page-body">
  <div class="container contyapi">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= admin_url() ?>"> <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Yöneticiler</li>
            <li class="breadcrumb-item">Yeni Yönetici Ekle</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container contyapi">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <div class="row mb-2">
              <div class="col-sm-4">
                <h5>Yeni Yönetici Ekle</h5>
              </div>
              <div class="col-sm-8">
                <div class="text-sm-right">
                  <a href="<?= admin_url('yoneticiler') ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-list"></i> Yöneticiler
                  </a>
                  <a href="<?= admin_url('yoneticiler/ekle') ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Yeni Yönetici Ekle
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="ajaxForm" action="<?= admin_url('yoneticiler/ekle') ?>">
              <div class="form theme-form">

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ad Soyad</label>
                      <input name="adsoyad" class="form-control" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" class="form-control" type="text" value="">
                    </div>
                  </div>
                </div>

               
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Şifre</label>
                      <input name="sifre" class="form-control" type="password">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Şifre Tekrar</label>
                      <input name="sifre_tekrar" class="form-control" type="password">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Durum</label>
                      <select name="durum" class="form-select">
                        <option value="1">Aktif</option>
                        <option value="0">Pasif</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
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