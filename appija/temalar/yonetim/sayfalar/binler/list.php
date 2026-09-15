<div class="page-body">

    <div class="container-fluid contyapi pt-4">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h5>Binler</h5>
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
                        <div class="dt-ext table-responsive">
                            <table class="display" id="tableorderascshow100">
                                <thead>
                                    <tr>
                                        <th style="width:40%">Banka</th>
                                        <th style="width:10%">BIN</th>
                                        <th style="width:10%">Type</th>
                                        <th style="width:10%">Sub Type</th>
                                        <th style="width:30%;" class="text-center">Durum</th>
                                        <th style="min-width:150px" class="text-end">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($binler->result() as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php $logo_name = url_title(convert_accented_characters($row->banka_adi), '-', TRUE) . '.png'; ?>
                                                <img width="100px" src="/public/bank/<?= $logo_name ?>" alt="public/bank/<?= $logo_name ?>">
                                                <?= $row->banka_adi  ?>
                                            </td>
                                            <td><?= $row->bin ?></td>
                                            <td><?= $row->type ?></td>
                                            <td><?= $row->sub_type ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($row->status == "1") {
                                                    echo '<span class="badge badge-success">Aktif</span>';
                                                } else if ($row->status == "banli") {
                                                    echo '<span class="badge badge-danger">BANLI</span>';
                                                } else{
                                                    echo '<span class="badge badge-warning">Pasif</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-end">
                                                <a href="<?= admin_url('binler/sil/' . $row->id) ?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Sil
                                                </a>
                                                <a href="<?= admin_url('binler/duzenle/' . $row->id) ?>" class="btn btn-primary btn-xs">
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