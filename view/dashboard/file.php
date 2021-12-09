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
                                          <h4 class="text-c-yellow f-w-600"><?php print $total_files ?></h4>
                                          <h6 class="text-muted m-b-0">Total Jobs</h6>
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
                                          <h6 class="text-muted m-b-0">Pending Jobs</h6>
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
                                          <h4 class="text-c-pink f-w-600"><?php print $complete ?></h4>
                                          <h6 class="text-muted m-b-0">Completed</h6>
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
                      <div class="col-xl-3 col-md-6">
                          <div class="card">
                              <div class="card-block">
                                  <div class="row align-items-center">
                                      <div class="col-8">
                                          <h4 class="text-c-blue f-w-600"><?php print number_format($profit_sum['SUM(v_profit)'],2) ?> </h4>
                                          <h6 class="text-muted m-b-0">Total Profit</h6>
                                      </div>
                                      <div class="col-4 text-right">
                                          <i class="feather icon-download f-28"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer bg-c-blue">
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
                      <!-- task, page, download counter  end -->


                        <!-- visitor start -->
                        <div class="col-xl-12 col-md-12">
                          <?php Response() ?>
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Tracking Board</h5>
                                </div>
                                <div class="card-block pl-3 pr-3">
                                    <?php if(empty($pending_jobs)): ?>
                                        <div class="row no-gutters px-20 py-15">
                                            <div class="col-12 col-sm-12 box-title">
                                                Congratulations, there are no pending jobs
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
                                                              <th>ETA</th>
                                                              <th>MAWB</th>
                                                              <th>PCS</th>
                                                              <th>GW</th>
                                                              <th>CW</th>
                                                              <th>AL</th>
                                                              <th>ORI</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php foreach($pending_jobs as $pending_job): ?>
                                                            <tr>
                                                                <td><a href="<?php base_url('dashboard/view_job/file/'.simple_encrypt($pending_job['v_job_no']).'/?id='.$pending_job['id']) ?>"><?php print $pending_job['v_job_no'] ?></a></td>
                                                                <td><?php print $pending_job['v_eta'] ?></td>
                                                                <td><?php print $pending_job['v_mawb'] ?></td>
                                                                <td><?php print $pending_job['v_pcs'] ?></td>
                                                                <td><?php print $pending_job['v_gw'] ?></td>
                                                                <td><?php print $pending_job['v_cw'] ?></td>
                                                                <td><?php print $pending_job['v_al'] ?></td>
                                                                <td><?php print $pending_job['v_orig'] ?></td>
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