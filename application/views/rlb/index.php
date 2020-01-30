<style type="text/css">
  th{
    text-align: center;
    background-color: black;
    color: white;
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
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Perhitungan Normalisasi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_y" data-toggle="tab">Relasi Linear Berganda</a></li>
                  <li class="nav-item"><a class="nav-link" href="#chart" data-toggle="tab">Chart</a></li>
                </ul>
              </div><!-- /.card-header -->
              <br/>
              <div class="card-body">
                <div class="tab-content" style="background-color: white;">
                  <div class="tab-pane active" id="tab_1">
                  <div>
                    <button class="btn btn-primary" style="margin: 10px 10px 10px 10px;" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Upload Data</button>
                  </div>
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
                          <td><?php echo date('M-Y', ($data->bulan - 25569) * 86400); ?></td>
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
                          <td><?php echo date('M-Y', ($data->bulan - 25569) * 86400); ?></td>
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
                    //$b1 = ($sigmax22*$sigmax1y) - ($sigmax2y*$sigmax1x2) / ($sigmax12*$sigmax22) - pow(abs($sigmax1x2), 2);
                    //$b2 = ($sigmax12*$sigmax2y) - ($sigmax1y*$sigmax1x2) / ($sigmax12*$sigmax22) - pow(abs($sigmax1x2), 2);
                    //$a = ($b1 * $pelanggan) - ($b2 * $produk) - $pendapatan /$n;

                    $matrixdeta = array(
                      array($n, $pelanggan, $produk),
                      array($pelanggan, $totx12, $totx1x2),
                      array($produk, $totx1x2, $totx22)
                    );

                    $deta = $this->m_rlb->matrixdet($matrixdeta);
                    //echo "<script>alert('".$deta."')</script>";

                    $matrixdeta1 = array(
                      array($pendapatan, $pelanggan, $produk),
                      array($totx1xy, $totx12, $totx1x2),
                      array($totx2xy, $totx1x2, $totx22)
                    );

                    $deta1 = $this->m_rlb->matrixdet($matrixdeta1);
                    //echo "<script>alert('".number_format($deta1)."')</script>";

                    $matrixdeta2 = array(
                      array($n, $pendapatan, $produk),
                      array($pelanggan, $totx1xy, $totx1x2),
                      array($produk, $totx2xy, $totx22)
                    );

                    $deta2 = $this->m_rlb->matrixdet($matrixdeta2);
                    //echo "<script>alert('".number_format($deta2)."')</script>";

                    $matrixdeta3 = array(
                      array($n, $pelanggan, $pendapatan),
                      array($pelanggan, $totx12, $totx1xy),
                      array($produk, $totx1x2, $totx2xy)
                    );

                    $deta3 = $this->m_rlb->matrixdet($matrixdeta3);
                    //echo "<script>alert('".number_format($deta3)."')</script>";


                    $a  = $deta1/$deta;
                    $b1 = $deta2/$deta;
                    $b2 = $deta3/$deta;
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
                        <td>Det(A)</td>
                        <td><?php echo number_format($deta); ?></td>
                      </tr> 
                      <tr>
                        <td>Det(A1)</td>
                        <td><?php echo number_format($deta1); ?></td>
                      </tr> 
                      <tr>
                        <td>Det(A2)</td>
                        <td><?php echo number_format($deta2); ?></td>
                      </tr> 
                      <tr>
                        <td>Det(A3)</td>
                        <td><?php echo number_format($deta3); ?></td>
                      </tr> 
                      <tr>
                        <td>a</td>
                        <td><?php echo $a; ?></td>
                      </tr>                      
                      <tr>
                        <td>B1</td>
                        <td><?php echo $b1; ?></td>
                      </tr>
                      <tr>
                        <td>B2</td>
                        <td><?php echo $b2; ?></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="tab_y">
                    <table class="table">
                      <tr>
                        <td>Masukan nilai X1 <input type="number" name="nilaix1" id="nilaix1" value="0" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>Masukan nilai X2 <input type="number" name="nilaix2" id="nilaix2" value="0" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>
                          <img src="<?php echo base_url('assets/img/rumusY.png') ?>">
                          <a onclick="munculY()" class="btn btn-warning">Lihat Hasil dari Y</a>
                          <input type="text" disabled id="output" value="0" class="form-control">
                          <script>
                              function munculY(){
                                var a       = Number('<?php echo $a ?>');
                                var b1      = Number('<?php echo $b1 ?>');
                                var b2      = Number('<?php echo $b2 ?>');
                                var nilaix1 = Number(document.getElementById("nilaix1").value);
                                var nilaix2 = Number(document.getElementById("nilaix2").value);

                                rumus = a+(b1*nilaix1)+(b2*nilaix2);
                                //rumus = nilaix2+nilaix1;
                                document.getElementById("output").value = parseFloat(rumus);
                              }
                          </script>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="<?php echo base_url('assets/img/rumusSeSyx.png') ?>">
                          <a onclick="munculSeSyx()" class="btn btn-warning">Lihat Standart Error Estimate</a>
                          <input type="text" disabled id="output2" value="0" class="form-control">
                          <script>
                              function munculSeSyx(){
                                var sigmay2     = Number('<?php echo $toty2 ?>');
                                var a           = Number('<?php echo $a ?>');
                                var pendapatan  = Number('<?php echo $pendapatan ?>');
                                var b1          = Number('<?php echo $b1 ?>');
                                var sigmax1y    = Number('<?php echo $sigmax1y ?>');
                                var b2          = Number('<?php echo $b2 ?>');
                                var sigmax2y    = Number('<?php echo $sigmax2y ?>');
                                var n           = Number('<?php echo $n ?>');
                                var rumus       = (sigmay2-(a*pendapatan)-(b1*sigmax1y)-(b2*sigmax2y))/n-3;

                                document.getElementById("output2").value = Math.sqrt(parseFloat(rumus));
                              }
                          </script>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="tab-pane" id="chart">
                    <div class="container">
                      <br />
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                    <!--       Chart.js Canvas Tag -->
                          <canvas id="barChart"></canvas>
                        </div>
                        <div class="col-md-1"></div>
                      </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                    <!--       Chart.js Canvas Tag -->
                          <canvas id="barChart1"></canvas>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                    <!--       Chart.js Canvas Tag -->
                          <canvas id="barChart2"></canvas>
                        </div>
                        <div class="col-md-1"></div>
                      </div>
                    </div>
                    <hr/>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM UPLOAD DATA RLB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('c_rlb/import'); ?>
        <form method="post" action="<?= base_url() . 'c_rlb/import'; ?>">
          <div class="form-group">
            <label for="inputEmail3" class="control-label">Lampirkan File</label>
            <input type="file" name="file" class="form-control" id="file" required accept=".xls, .xlsx, .csv" /></p>
            <p class="help-block">Format file yang didukung .xls, .xlsx atau .csv</p>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Upload" name="upload" id="upload">
          </div>
          <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>
<script src="<?php echo base_url()?>assets/chartjs/Chart.js"></script>

<?php
  $this->load->view('rlb/chart');
?>