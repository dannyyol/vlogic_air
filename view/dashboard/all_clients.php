<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- visitor start -->
                        <div class="col-xl-12 col-md-12">
                          <?php Response() ?>
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>All Clients</h5>
                                </div>
                                <div class="card-block pl-3 pr-3">
                                    <?php if(empty($clients)): ?>
                                        <div class="row no-gutters px-20 py-15">
                                            <div class="col-12 col-sm-12 box-title">
                                                No Client Recorded
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
                                                              <th>SHORT NAME</th>
                                                              <th>FULL NAME</th>
                                                              <th>CONTACT E-MAIL</th>
                                                              <th>DATE ADDED</th>
                                                              <th></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php foreach($clients as $client): ?>
                                                            <tr>
                                                                <td><?php print $client['client_short_name'] ?></td>
                                                                <td><?php print $client['client_full_name'] ?></td>
                                                                <td><?php print $client['con_email'] ?></td>
                                                                <td><?php print formatDate($client['client_date_added'],'full abb') ?></td>
                                                                <td><a href="<?php base_url('dashboard/view_client/client/'.$client['client_short_name']) ?>">View Client</a></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                  </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <ul class="pagination">
                                      <?php paginationFooter('dashboard/all_clients/page/', 'active', TRUE) ?>
                                    </ul>
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