<div class="page-body">

    <div class="container-fluid contyapi pt-4">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h5>Banlar</h5>
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
                        <div class="dt-ext table-responsive">
                            <table class="display" id="tableorderdesc">
                                <thead>
                                    <tr>
                                        <th style="width:1%">id</th>
                                        <th style="width:10%">ip</th>
                                        <th style="width:60%">neden</th>
                                        <th style="width:10%">tarih</th>
                                        <th style="min-width:150px" class="text-end">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($banlar->result() as $row) { ?>
                                        <tr>
                                            <td><?= $row->id ?></td>
                                            <td><?= $row->ip ?></td>
                                            <td><?= $row->neden ?></td>
                                            <td><?= dmyhi($row->tarih) ?></td>
                                            <td class="text-end">
                                                <a href="<?= admin_url('banlar/sil/' . $row->id) ?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Sil
                                                </a>
                                                <a href="<?= admin_url('banlar/duzenle/' . $row->id) ?>" class="btn btn-primary btn-xs">
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