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
                <h5>Yöneticiler</h5>
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
            <div class="dt-ext table-responsive">
              <table class="display" id="tableorderasc">
                <thead>
                  <tr>
                    <th style="width:2%">ID</th>
                    <th style="width:10%">Ad Soyad</th>
                    <th style="width:5%">Email</th>
                    <th style="width:8%">Son Giriş</th>
                    <th style="width:5%">IP</th>
                    <th style="width:5%">Durum</th>
                    <th style="width:10%; min-width:170px" class="text-end">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($yoneticiler->result() as $row) { ?>
                    <tr>
                      <td><?= $row->id ?></td>
                      <td><?= $row->adsoyad ?></td>
                      <td><?= $row->email ?></td>
                      <td><?= dmyhi($row->songiris) ?></td>
                      <td><?= $row->ip ?></td>
                      <td>
                        <?php
                        if ($row->durum) {
                          echo '<span class="badge badge-success">Aktif</span>';
                        } else {
                          echo '<span class="badge badge-danger">Pasif</span>';
                        }
                        ?>
                      </td>
                      <td class="text-end">
                        <a href="<?= admin_url('yoneticiler/sil/' . $row->id) ?>" class="btn btn-danger btn-sm sor-sil">
                          <i class="fa fa-trash"></i> Sil
                        </a>
                        <a href="<?= admin_url('yoneticiler/duzenle/' . $row->id) ?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-edit"></i> Düzenle
                        </a>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>