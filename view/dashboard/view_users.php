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
                                          <h4 class="text-c-yellow f-w-600"><?php print $total_users ?></h4>
                                          <h6 class="text-muted m-b-0">Total Users</h6>
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
                                          <h4 class="text-c-green f-w-600"><?php print $online ?></h4>
                                          <h6 class="text-muted m-b-0">Online Users</h6>
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
                                          <h4 class="text-c-pink f-w-600"><?php print $offline ?></h4>
                                          <h6 class="text-muted m-b-0">Offline Users</h6>
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
                                          <h4 class="text-c-blue f-w-600"><?php print $suspended ?></h4>
                                          <h6 class="text-muted m-b-0">Suspended Users</h6>
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
                                    <h5>User List</h5>
                                </div>
                                <div class="card-block pl-3 pr-3">
                                    <?php if(empty($all_userz)): ?>
                                        <div class="row no-gutters px-20 py-15">
                                            <div class="col-12 col-sm-12 box-title">
                                                No user found
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
                                                            <th>Full Name</th>
                                                            <th>Email Address</th>
                                                            <th>Password</th>
                                                            <th>I.P Address</th>
                                                            <th>Role</th>
                                                            <th>Since</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php foreach($all_userz as $all_user): ?>
                                                            <tr>
                                                              <form id="userupdate_<?php print $i ?>" action="<?php base_url('dashboard/view_users/update_user') ?>" method="POST">
                                                                <td><input type="text" form="userupdate_<?php print $i ?>" name="user_full_name" class="border-0" placeholder="" style="background-color: transparent!important;" value="<?php print $all_user['user_full_name'] ?>">
                                                                </td>
                                                                <td>
                                                                  <input type="text" form="userupdate_<?php print $i ?>" name="user_mail" class="border-0" placeholder="" style="background-color: transparent!important;" value="<?php print $all_user['user_mail'] ?>">
                                                                </td>
                                                                <td>
                                                                  <input type="text" form="userupdate_<?php print $i ?>" name="user_psw" class="border-0" placeholder="Type a new password" style="background-color: transparent!important;">
                                                                </td>
                                                                <td>
                                                                  <input type="text" form="userupdate_<?php print $i ?>" name="ip_address" class="border-0" placeholder="" style="background-color: transparent!important;" value="<?php print $all_user['ip_address'] ?>">
                                                                </td>
                                                                <td>
                                                                  <select form="userupdate_<?php print $i ?>" name="user_role" class="border-0" placeholder="" style="background-color: transparent!important;" class="form-control">
                                                                      <option value="<?php print ucfirst($all_user['user_role']) ?>"><?php print $all_user['user_role'] ?></option>
                                                                      <option value="Staff 1">Staff (cost)</option>
                                                                      <option value="Staff 2">Staff (Selling)</option>
                                                                      <option value="Admin">Admin</option>
                                                                      <option value="Manager">Manager</option>
                                                                  </select>
                                                                </td>
                                                                <td>
                                                                  <?php print $all_user['user_since'] ?>
                                                                </td>
                                                                <td>
                                                                  <select form="userupdate_<?php print $i ?>" name="user_status" class="border-0" placeholder="" style="background-color: transparent!important;" class="form-control">
                                                                      <option><?php print $all_user['user_status'] ?></option>
                                                                      <option>Online</option>
                                                                      <option>Offline</option>
                                                                      <option>Suspended</option>
                                                                  </select>
                                                                </td>
                                                                <td>  
                                                                <button type="submit" form="userupdate_<?php print $i ?>" name="newuser" class="btn btn-info"><small>Update</small> </button>
                                                                    
                                                                <a href="<?php base_url('dashboard/view_users/remove_user/'.$all_user['id']) ?>" onclick="javascript:return confirm('You are about to delete this user?')" class="btn btn-danger">Delete User</a>
                                                                </td>
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