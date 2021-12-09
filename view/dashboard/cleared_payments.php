<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                      <!-- task, page, download counter  start -->
                      <div class="col-xl-3 col-md-6">
                          <div class="card">
                              <div class="card-block">
                                  <div class="row align-items-center">
                                      <div class="col-8">
                                          <h4 class="text-c-yellow f-w-600"><?php print $total ?></h4>
                                          <h6 class="text-muted m-b-0">Total Payments</h6>
                                      </div>
                                      <div class="col-4 text-right">
                                          <i class="feather icon-bar-chart f-28"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer bg-c-yellow">
                                  <div class="row align-items-center">
                                      <div class="col-9">
                                          <p class="text-white m-b-0">overview</p>
                                      </div>
                                      <div class="col-3 text-right">
                                          <i class="feather icon-trending-up text-white f-16"></i>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-md-6">
                          <div class="card">
                              <div class="card-block">
                                  <div class="row align-items-center">
                                      <div class="col-8">
                                          <h4 class="text-c-green f-w-600"><?php print $incomplete ?></h4>
                                          <h6 class="text-muted m-b-0">Pending</h6>
                                      </div>
                                      <div class="col-4 text-right">
                                          <i class="feather icon-file-text f-28"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer bg-c-green">
                                  <div class="row align-items-center">
                                      <div class="col-9">
                                          <p class="text-white m-b-0">overview</p>
                                      </div>
                                      <div class="col-3 text-right">
                                          <i class="feather icon-trending-up text-white f-16"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-md-6">
                          <div class="card">
                              <div class="card-block">
                                  <div class="row align-items-center">
                                      <div class="col-8">
                                          <a href="<?php base_url('dashboard/clearing_payments') ?>">
                                              <h4 class="text-c-pink f-w-600"><?php print $complete ?></h4>
                                              <h6 class="text-muted m-b-0">Cleared Payments</h6>
                                          </a>
                                      </div>
                                      <div class="col-4 text-right">
                                          <i class="feather icon-calendar f-28"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer bg-c-pink">
                                  <div class="row align-items-center">
                                      <div class="col-9">
                                          <p class="text-white m-b-0">overview</p>
                                      </div>
                                      <div class="col-3 text-right">
                                          <i class="feather icon-trending-up text-white f-16"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="col-xl-3 col-md-6">
                          <div class="card">
                              <div class="card-block">
                                  <div class="row align-items-center">
                                      <div class="col-8">
                                          <h4 class="text-c-blue f-w-600"><?php print $mawb ?></h4>
                                          <h6 class="text-muted m-b-0">MAWB</h6>
                                      </div>
                                      <div class="col-4 text-right">
                                          <i class="feather icon-download f-28"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer bg-c-blue">
                                  <div class="row align-items-center">
                                      <div class="col-9">
                                          <p class="text-white m-b-0">awaiting clearing</p>
                                      </div>
                                      <div class="col-3 text-right">
                                          <i class="feather icon-trending-up text-white f-16"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> -->
                      <!-- task, page, download counter  end -->


                        <!-- visitor start -->
                        <div class="col-xl-12 col-md-12">
                          <?php Response() ?>

                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Cleared Payments <small> </small></h5>
                                </div>
                                <div class="card-block pl-3 pr-3">
                                    <?php if(empty($cleared)): ?>
                                        <div class="row no-gutters px-20 py-15">
                                            <div class="col-12 col-sm-12 box-title">
                                                There are no cleared payments
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <div class="table-responsive">
                                      <!-- DOM/Jquery table start -->
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive" id='data'>
                                                  <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                                      <thead>
                                                          <tr>
                                                              <th>JOB NO.</th>
                                                              <th class="text-center">MAWB</th>
                                                              <th class="text-center">PAYMENT TO</th>
                                                              <th class="text-center">AMOUNT</th>
                                                              <th class="text-center">PAID</th>
                                                              <th class="text-center">Action</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php foreach($cleared as $clearin): ?>
                                                            <tr>
                                                                <form id="mawbupdate_<?php print $i ?>" action="<?php base_url('dashboard/clearing_payments/update_mawb') ?>" method="POST">
                                                                <td class="align-baseline"><input type="text" form="mawbupdate_<?php print $i ?>" name="v_job_no" class="border-0" placeholder="click" style="background-color: transparent!important;" value="<?php print $clearin['v_job_no'] ?>" readonly>
                                                                </td>
                                                                <td class="text-center align-baseline"><?php print $clearin['v_mawb'] ?></td>
                                                                <td class="text-center align-baseline">
                                                                  <input type="text" form="mawbupdate_<?php print $i ?>" name="mawb_to" class="border-0" placeholder="click" style="background-color: transparent!important;" value="<?php print $clearin['v_mawbto'] ?>">
                                                                </td>
                                                                <td class="text-center align-baseline">
                                                                  <input type="text" form="mawbupdate_<?php print $i ?>" name="mawb_amt" class="border-0" placeholder="click" style="background-color: transparent!important;" value="<?php print $clearin['v_mawbamt'] ?>">
                                                                </td>
                                                                <td class="text-center align-baseline">
                                                                  <input type="checkbox" form="mawbupdate_<?php print $i ?>" name="mawb_com" class="border-0" placeholder="click" style="background-color: transparent!important;" <?php print  $clearin['v_mawbcom']  == 1 ? 'checked' : NULL?>>
                                                                </td>
                                                                <td class="text-center align-baseline"><button type="submit" form="mawbupdate_<?php print $i ?>" name="newmawb" class="btn btn-info"><small>Update</small> </button></td>
                                                                </form>
                                                            </tr>
                                                        <?php $i++; endforeach ?>
                                                  </tbody>
                                                  </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <!-- DOM/Jquery table end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>




<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/jquery/js/jquery.min.js") ?>"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-ui/js/jquery-ui.min.js") ?>"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/popper.js/js/popper.min.js") ?>"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/bootstrap/js/bootstrap.min.js") ?>"></script>
<!-- jquery slimscroll js -->
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-slimscroll/js/jquery.slimscroll.js") ?>"></script>
<!-- modernizr js -->
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/modernizr/js/modernizr.js") ?>"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/modernizr/js/css-scrollbars.js") ?>"></script>
<!-- Chart js -->
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/bower_components/chart.js/js/Chart.js") ?>"></script>
<!-- amchart js -->
<script src="<?php base_url("assets/air/assets/pages/widget/amchart/amcharts.js") ?>" type="22464d6e97ca88790963c0b8-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/widget/amchart/serial.js") ?>" type="22464d6e97ca88790963c0b8-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/widget/amchart/light.js") ?>" type="22464d6e97ca88790963c0b8-text/javascript"></script>
<!-- data-table js -->
<script src="<?php base_url("assets/air/bower_components/datatables.net/js/jquery.dataTables.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/data-table/js/jszip.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/data-table/js/pdfmake.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/data-table/js/vfs_fonts.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-buttons/js/buttons.print.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-buttons/js/buttons.html5.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<!-- Custom js -->
<script src="<?php base_url("assets/air/assets/pages/data-table/js/data-table-custom.js") ?>" type="f427023efc302e7ccee1f526-text/javascript"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/assets/js/SmoothScroll.js") ?>"></script>
<script src="<?php base_url("assets/air/assets/js/pcoded.min.js") ?>" type="22464d6e97ca88790963c0b8-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/jquery.mCustomScrollbar.concat.min.js") ?>" type="22464d6e97ca88790963c0b8-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/vartical-layout.min.js") ?>" type="22464d6e97ca88790963c0b8-text/javascript"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/assets/pages/dashboard/analytic-dashboard.min.js") ?>"></script>
<script type="22464d6e97ca88790963c0b8-text/javascript" src="<?php base_url("assets/air/assets/js/script.js") ?>"></script>
<!-- other -->
<script src="<?php base_url("assets/air/ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js") ?>" data-cf-settings="22464d6e97ca88790963c0b8-|49" defer=""></script>
<script src="<?php base_url("assets/air/ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js") ?>" data-cf-settings="f427023efc302e7ccee1f526-|49" defer=""></script>