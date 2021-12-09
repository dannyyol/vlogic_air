<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card borderless-card">
                    <div class="card-block rounded shadow-lg info-breadcrumb">
                        <div class="breadcrumb-header">
                          <h4>Login History</h4>
                          <span>Recent Logins</span>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="dashboard">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">Login History</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">


                        <!-- visitor start -->
                        <div class="col-xl-12 col-md-12">
                          <?php Response() ?>
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Login History</h5>
                                </div>
                                <div class="card-block pl-3 pr-3">
                                    <?php if(empty($history)): ?>
                                        <div class="row no-gutters px-20 py-15">
                                            <div class="col-12 col-sm-12 box-title">
                                                Congratulations, no available history
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <div class="table-responsive">
                                      <!-- DOM/Jquery table start -->
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive" id='data'>
                                                  <table class="table table-striped table-bordered nowrap">
                                                      <thead>
                                                          <tr>
                                                            <th>User</th>
                                                            <th class="text-center">IP Address</th>
                                                            <th class="text-center">Device</th>
                                                            <th class="text-center">Browser</th>
                                                            <th class="text-center">Location</th>
                                                            <th class="text-center">Date/Time</th>
                                                            <th class="text-center">Message</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php foreach($history as $historys): ?>
                                                            <tr>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print $historys['user_mail'] ?></td>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print $historys['user_ip'] ?></td>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print $historys['user_device'] ?></td>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print $historys['user_browser'] ?></td>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print $historys['user_location'] ?></td>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print formatDate($historys['user_date'], 'full abb') ?></td>
                                                            <td class="font-weight-normal align-middle text-nowrap text-center"><?php print $historys['user_message'] ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
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