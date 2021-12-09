<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card borderless-card">
                              <div class="card-block rounded shadow-lg info-breadcrumb">
                                  <div class="breadcrumb-header">
                                      <h5>View/Update Client Details</h5>
                                  </div>
                                  <div class="page-header-breadcrumb">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="dashboard">
                                                  <i class="icofont icofont-home"></i>
                                              </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="">Update Client Details</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
              
                  <!-- Page body start -->
                  <div class="page-body">
                    <div class="row">
                      <!-- Left column start -->
                        <div class="col-md-8 mx-auto">
                        <?php Response() ?>
                          <!-- Flying Word card start -->
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="sub-title">Client Details</h4>
                                    <form action="<?php base_url('dashboard/view_client/edit/'.$client['client_short_name']) ?>" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Client Short Name</small>
                                            <input type="text" name="client_short_name" class="form-control" value="<?php print $client['client_short_name'] ?>" placeholder="Client Short Name" required />
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Client Full Name</small>
                                            <input type="text" name="client_full_name" class="form-control" value="<?php print $client['client_full_name'] ?>" placeholder="Client Full Name" required />
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Address</small>
                                            <input type="text" name="address" class="form-control" value="<?php print $client['client_address'] ?>" placeholder="Address" required />
                                        </div>
                                        
                                        <div class="col-sm-12 mb-3 mt-4">
                                            <h5>Contact Person Details</h5>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Full Name</small>
                                            <input type="text" name="con_full_name" class="form-control" value="<?php print $client['con_full_name'] ?>" placeholder="Contact Full Name" required />
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">E-mail</small>
                                            <input type="email" name="con_email" class="form-control" value="<?php print $client['con_email'] ?>" placeholder="Contact E-mail" required />
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Telephone</small>
                                            <input type="text" name="con_tel" class="form-control" value="<?php print $client['con_tel'] ?>" placeholder="Contact Phone No" required />
                                        </div>
                                        <div class="col-sm-12 mt-2 d-flex justify-content-end">
                                            <a href="<?php base_url('dashboard/view_client/delete_client/'.$client['client_short_name']) ?>" onclick="javascript: return confirm('You are about to delete client data')" class="btn btn-danger m-r-10 rounded shadow-lg"> <i class="icofont icofont-trash"></i> Delete</a>
                                            <button type="submit" name="client_btn" class="btn btn-info m-r-10 rounded shadow-lg"> <i class="icofont icofont-plus"></i> Update</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                              <!-- Flying Word card end -->
                          </div>
                          <!-- Left column end -->
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
