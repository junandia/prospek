<style type="text/css">
  th{
    text-align: center;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data RLB</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Data RLB</h3>
                <ul class="nav nav-pills ml-auto p-2" style="background-color: white;">
                  <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Normalisasi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Relasi Linear Berganda</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Standart Error Estimate</a></li>
                </ul>
              </div><!-- /.card-header -->
              <br/>
              <div class="card-body">
                <div class="tab-content" style="background-color: white;">
                  <div class="tab-pane active" id="tab_1">
                    <table class="table table-bordered">
                      <thead>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jumlah Pelanggan</th>
                        <th>Jumlah Produk</th>
                        <th>Pendapatan</th>
                      </thead>
                      <tbody>
                        <?php
                          $n = 1;
                          $pelanggan = 0;
                          $produk = 0;
                          $pendapatan = 0;
                          foreach ($rlb as $data) {
                        ?>
                        <tr>
                          <td><?php echo $n++; ?></td>
                          <td><?php echo $data->bulan; ?></td>
                          <td><?php echo $x1 = $data->jumlah_pelanggan; ?></td>
                          <td><?php echo $x2 = $data->jumlah_produk; ?></td>
                          <td><?php echo $y = $data->pendapatan; ?></td>
                        </tr>
                        <?php
                            $pelanggan = $x1+$pelanggan;
                            $produk = $x2 + $produk;
                            $pendapatan = $y + $pendapatan;
                          }
                        ?>
                      </tbody>
                      <tfoot>
                        <th colspan="2">n = <?php echo $n-1; ?></th>
                        <th><?php echo $pelanggan; ?></th>
                        <th><?php echo $produk; ?></th>
                        <th><?php echo $pendapatan; ?></th>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <table class="table table-bordered">
                      <thead>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jumlah Pelanggan (X1)</th>
                        <th>Jumlah Produk (X2)</th>
                        <th>Pendapatan (Y)</th>
                        <th>Y^2</th>
                        <th>X1^2</th>
                        <th>X2^2</th>
                        <th>X1.Y</th>
                        <th>X2.Y</th>
                        <th>X1.X2</th>
                      </thead>
                      <tbody>
                        <?php
                          $n = 1;
                          $pelanggan = 0;
                          $produk = 0;
                          $pendapatan = 0;
                          $toty2 = 0;
                          $totx12 = 0;
                          $totx22 = 0;
                          $totx1xy = 0;
                          $totx2xy = 0;
                          $totx1x2 = 0;
                          foreach ($rlb as $data) {
                        ?>
                        <tr>
                          <td><?php echo $n++; ?></td>
                          <td><?php echo $data->bulan; ?></td>
                          <td><?php echo number_format($x1 = $data->jumlah_pelanggan); ?></td>
                          <td><?php echo number_format($x2 = $data->jumlah_produk); ?></td>
                          <td><?php echo number_format($y = $data->pendapatan); ?></td>
                          <td><?php echo number_format($y2 = pow($y, 2)); ?></td>
                          <td><?php echo number_format($x12 = pow($x1, 2)); ?></td>
                          <td><?php echo number_format($x22 = pow($x2, 2)); ?></td>
                          <td><?php echo number_format($x1xy = $x1*$y); ?></td>
                          <td><?php echo number_format($x2xy = $x2*$y); ?></td>
                          <td><?php echo number_format($x1x2 = $x1*$x2); ?></td>
                        </tr>
                        <?php
                            $pelanggan = $x1+$pelanggan;
                            $produk = $x2 + $produk;
                            $pendapatan = $y + $pendapatan;
                            $toty2 = $y2 + $toty2;
                            $totx12 = $x12 + $totx12;
                            $totx22 = $x22 + $totx22;
                            $totx1xy = $x1xy + $totx1xy;
                            $totx2xy = $x2xy + $totx2xy;
                            $totx1x2 = $x1x2 + $totx1x2;
                          }
                        ?>
                      </tbody>
                      <tfoot>
                        <th colspan="2">n = <?php echo $n = $n-1; ?></th>
                        <th><?php echo number_format($pelanggan); ?></th>
                        <th><?php echo number_format($produk); ?></th>
                        <th><?php echo number_format($pendapatan); ?></th>
                        <th><?php echo number_format($toty2); ?></th>
                        <th><?php echo number_format($totx12); ?></th>
                        <th><?php echo number_format($totx22); ?></th>
                        <th><?php echo number_format($totx1xy); ?></th>
                        <th><?php echo number_format($totx2xy); ?></th>
                        <th><?php echo number_format($totx1x2); ?></th>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <?php
                    //rumus tahap2
                    $sigmax12 = (pow($pelanggan, 2)/$n) - $totx12;
                    $sigmax22 = (pow($produk, 2)/$n) - $totx22;
                    $sigmay2  = (pow($pendapatan, 2)/$n) - $toty2;
                    $sigmax1y = (($pelanggan * $pendapatan)/$n) - $totx1xy;
                    $sigmax2y = (($produk*$pendapatan)/$n) - $totx2xy;
                    $sigmax1x2 = (($pelanggan * $produk)/$n) - $totx1x2;



                    //rumus tahap3
                    $b1 = ($sigmax22*$sigmax1y) - ($sigmax2y*$sigmax1x2) / ($sigmax12*$sigmax22) - pow(abs($sigmax1x2), 2);
                    $b2 = ($sigmax12*$sigmax2y) - ($sigmax1y*$sigmax1x2) / ($sigmax12*$sigmax22) - pow(abs($sigmax1x2), 2);
                    $a = ($b1 * $pelanggan) - ($b2 * $produk) - $pendapatan /$n;

                    //Y
                    $y = $a+($b1*$pelanggan)+($b2*$produk);
                    ?>
                    <table class="table">
                      <thead>
                        <th>Nama</th>
                        <th>Nilai</th>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Sigma X1^2</td>
                        <td><?php echo number_format($sigmax12); ?></td>
                      </tr>
                      <tr>
                        <td>Sigma X2^2</td>
                        <td><?php echo number_format($sigmax22); ?></td>
                      </tr>
                      <tr>
                        <td>Sigma Y^2</td>
                        <td><?php echo number_format($sigmay2); ?></td>
                      </tr>
                      <tr>
                        <td>Sigma X1*Y</td>
                        <td><?php echo number_format($sigmax1y); ?></td>
                      </tr>
                      <tr>
                        <td>Sigma X2^Y</td>
                        <td><?php echo number_format($sigmax2y); ?></td>
                      </tr>
                      <tr>
                        <td>Sigma X1*X2</td>
                        <td><?php echo number_format($sigmax1x2); ?></td>
                      </tr>
                      <tr>
                        <td>B1</td>
                        <td><?php echo number_format($b1); ?></td>
                      </tr>
                      <tr>
                        <td>B2</td>
                        <td><?php echo number_format($b2); ?></td>
                      </tr>
                      <tr>
                        <td>a</td>
                        <td><?php echo number_format($a); ?></td>
                      </tr>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Y = <?php echo number_format($y); ?></th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="tab-pane" id="tab_4">
                  <table class="table">
                    <tr>
                      <th>Se(Syx) = 
                        <?php 
                          $rumus = ($sigmay2 - ($a*$pendapatan) - ($b1 * $sigmax1y) - ($b2*$sigmax2y))/$n-3;

                          echo sqrt($rumus);
                        ?>
                      
                      </th>
                    </tr>
                  </table>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
</body>

