<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
              <div class="card borderless-card">
                      <div class="card-block rounded shadow-lg info-breadcrumb">
                          <div class="breadcrumb-header">
                              <h5>Settings</h5>
                              <span>Report to your admin for changes.</span>
                          </div>
                          <div class="page-header-breadcrumb">
                              <ul class="breadcrumb-title">
                                  <li class="breadcrumb-item">
                                      <a href="dashboard">
                                          <i class="icofont icofont-home"></i>
                                      </a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="">Settings</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <?php Response() ?>
                  <!-- Page body start -->
                  <div class="page-body">
                    <div class="row">
                      <!-- Left column start -->
                        <div class="col-lg-6 col-xl-6">
                          <!-- Flying Word card start -->
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="sub-title">User Details</h4>
                                    <form id="newuser" action="<?php base_url('dashboard/create_user/process') ?>" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Full Name</small>
                                            <input type="text" disabled="" name="new_full_name" class="form-control" placeholder="Enter full name" value="<?php print call_sess(USER_SESSION, 'name') ?>">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Email Address</small>
                                            <input type="text" disabled="" name="new_mail" class="form-control" placeholder="Enter value" value="<?php print call_sess(USER_SESSION, 'email') ?>">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                              <!-- Flying Word card end -->
                          </div>
                          <!-- Left column end -->
                          <!-- Right column start -->
                          <div class="col-lg-6 col-xl-6">

                            <div class="card">
                                <div class="card-block">
                                    <h4 class="sub-title">Account Details</h4>
                                    <form id="newuser" action="<?php base_url('dashboard/create_user/process') ?>" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Role</small>
                                            <input type="text" disabled="" name="new_full_name" class="form-control" placeholder="Enter full name" value="<?php print call_sess(USER_SESSION, 'user_role') ?>">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Since</small>
                                            <input type="text" disabled="" name="new_mail" class="form-control" placeholder="Enter value" value="<?php print call_sess(USER_SESSION, 'user_since') ?>">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                              <!-- Filter card start -->
                              <div class="card">
                                  <div class="card-block">
                                      <h4 class="sub-title">Avater</h4>
                                        <div class="form-group row">
                                              <div class="col-sm-12 mb-3">
                                            <small id="textHelp" class="form-text text-muted">Only file format <code>png, jpg, jepg</code> and size <code>max 2mb</code> allowed.</small>
                                            <form action="<?php base_url('dashboard/settings/avater') ?>" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="new_avater" class="form-control" placeholder="Enter value">
                                            <button type="submit" name="newuavater" class="btn btn-info m-r-10 rounded shadow-lg mt-4"> <i class="icofont icofont-plus"></i><small>Upload Avater</small> </button>
                                        </form>
                                        </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Right column end -->
                      </div>
                  </div>
                  <!-- Page body end -->
            </div>
        </div>
        <!-- Main-body end -->
                            <!-- <div id="styleSelector"> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
























<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/jquery/js/jquery.min.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-ui/js/jquery-ui.min.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/popper.js/js/popper.min.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/bootstrap/js/bootstrap.min.js") ?>"></script>
<!-- jquery slimscroll js -->
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-slimscroll/js/jquery.slimscroll.js") ?>"></script>
<!-- modernizr js -->
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/modernizr/js/modernizr.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/modernizr/js/css-scrollbars.js") ?>"></script>
<!-- jquery file upload js -->
<script src="<?php base_url("assets/air/assets/pages/jquery.filer/js/jquery.filer.min.js") ?>" type="30076f9a1e53b41637eb4d57-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/filer/custom-filer.js") ?>" type="30076f9a1e53b41637eb4d57-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/filer/jquery.fileuploads.init.js") ?>" type="30076f9a1e53b41637eb4d57-text/javascript"></script>
<!-- i18next.min.js -->
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/i18next/js/i18next.min.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js") ?>"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-i18next/js/jquery-i18next.min.js") ?>"></script>
<!-- Custom js -->
<script src="<?php base_url("assets/air/assets/js/pcoded.min.js") ?>" type="2ec0e7380a312b3eebaf36f6-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/vartical-layout.min.js") ?>" type="2ec0e7380a312b3eebaf36f6-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/jquery.mCustomScrollbar.concat.min.js") ?>"  type="2ec0e7380a312b3eebaf36f6-text/javascript"></script>
<script type="2ec0e7380a312b3eebaf36f6-text/javascript" src="<?php base_url("assets/air/assets/js/script.js") ?>"></script>

<script src="<?php base_url("assets/air/ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js") ?>" data-cf-settings="2ec0e7380a312b3eebaf36f6-|49" defer=""></script>
<script src="<?php base_url("assets/air/ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js") ?>" data-cf-settings="30076f9a1e53b41637eb4d57-|49" defer=""></script>
