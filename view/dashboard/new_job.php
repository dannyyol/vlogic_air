<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
              <div class="card borderless-card">
                      <div class="card-block rounded shadow-lg info-breadcrumb">
                          <div class="breadcrumb-header">
                              <h5>Create New Job</h5>
                              <span>Current date  is <?php echo date('D d M, Y'); ?> &nbsp; <?php echo date("h:i:sa"); ?></span>
                          </div>
                          <div class="page-header-breadcrumb">
                              <ul class="breadcrumb-title">
                                  <li class="breadcrumb-item">
                                      <a href="dashboard">
                                          <i class="icofont icofont-home"></i>
                                      </a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="">New Job</a>
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
                                    <h4 class="sub-title">Job Details</h4>
                                    <form id="newjob" action="<?php base_url('dashboard/new_job/process') ?>" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Job No</small>
                                            <input type="text" name="v_job_no" class="form-control" placeholder="eg. VLN1712-0024LOG" required />
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">MAWB</small>
                                            <input type="text" name="v_mawb" class="form-control" placeholder="Enter value">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">QTY</small>
                                            <input type="text" name="v_qty" class="form-control" placeholder="Enter value">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Date</small>
                                            <input type="date" name="v_date" class="form-control" placeholder="YYYY-mm-dd">
                                          </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">ETA</small>
                                            <input type="date" name="v_eta" class="form-control" placeholder="YYYY-mm-dd">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Delay</small>
                                            <input type="text" name="v_delay" class="form-control" placeholder="Enter delay">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Client</small>
                                            <select name="v_client" class="form-control" id="v_client">
                                                <option value="">--Select--</option>
                                                <?php foreach($clients as $client): ?>
                                                    <option value="<?php print $client['client_short_name'] ?>"><?php print ucfirst($client['client_full_name']) ?></option>
                                                <?php endforeach ?>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <textarea type="text" name="v_remarks" class="form-control" placeholder="Remarks" rows="5"></textarea>
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
                              <!-- Filter card start -->
                              <div class="card">
                                  <div class="card-block">
                                      <h4 class="sub-title">Job Details Cont..</h4>
                                        <div class="form-group row">
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Commodity</small>
                                            <input type="text" form="newjob" name="v_commodity" class="form-control" placeholder="Enter value">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Job Type</small>
                                            <select name="job_type" form="newjob" class="form-control">
                                                <option value="">--Select--</option>
                                                <option value="consolidation - air">Consolidation - Air</option>
                                                <option value="consolidation - sea">Consolidation - Sea</option>
                                                <option value="air freight">Air Freight</option>
                                                <option value="sea freight">Sea Freight</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">CNE</small>
                                            <input type="text" form="newjob" name="v_cne" class="form-control" placeholder="Enter value">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">GW</small>
                                            <input type="text" form="newjob" name="v_gw" class="form-control" placeholder="Enter value">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">CW</small>
                                            <input type="text" form="newjob" name="v_cw" class="form-control" placeholder="Enter value">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">AL</small>
                                            <input type="text" form="newjob" name="v_al" class="form-control" placeholder="">
                                          </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">ORIG</small>
                                            <input type="text" form="newjob" name="v_orig" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">Agent</small>
                                            <input type="text" form="newjob" name="v_agent" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <small class="col-lable">IN</small>
                                            <input type="text" form="newjob" name="v_in" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-sm-12 mt-2 d-flex justify-content-end">
                                            <button type="submit" form="newjob" name="v_jobnew" class="btn btn-info m-r-10 rounded shadow-lg"> <i class="icofont icofont-plus"></i> Create Job</button>
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

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="new_client_modal_btn" data-target="#myModal" style="display:none">Open Modal</button>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Client</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div id="new_client_fb"></div>
        <form method="POST" id="new_client_form">
            <div class="form-group row">
                <div class="col-sm-12 mb-3">
                    <small class="col-lable">Client Short Name</small>
                    <input type="text" name="client_short_name" class="form-control"placeholder="Client Short Name" required />
                </div>
                <div class="col-sm-12 mb-3">
                    <small class="col-lable">Client Full Name</small>
                    <input type="text" name="client_full_name" class="form-control" placeholder="Client Full Name" required />
                </div>
                
                <div class="col-sm-12 mt-2 d-flex justify-content-end">
                    <button type="submit" name="client_btn" class="btn btn-info m-r-10 rounded shadow-lg"> <i class="icofont icofont-plus"></i> Create</button>
                </div>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>





<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

<script>
    $(function(){
        $(document).on('change','#v_client',function(){
            let client_val = $(this).val();
            if(client_val == 'other'){
                // trigger modal open
                $('#new_client_modal_btn').click();
            }
        })
        
        // submit form
        $(document).on('submit','#new_client_form',function(e){
            e.preventDefault();
            
            let formData = $(this).serialize();
            let return_html;
            
            // display loader
            $('#new_client_fb').html('<div class="alert alert-warning">Creating client...</div>');
            
            $.post(
                '<?php base_url('api/new_client/') ?>',
                formData,
                function(data){
                    data = JSON.parse(data);
                    if(data.error == 1){
                        return_html = '<div class="alert alert-warning">'+data.msg+'</div>'
                    }
                    else if(data.error == 0){
                        return_html = '<div class="alert alert-success">'+data.msg+'</div>'
                        
                        $('#v_client').append('<option value="'+data.client_short_name+'" selected="selected">'+data.client_name+'</option>')
                    }
                    
                    $('#new_client_fb').html(return_html);
                }
            );
        })
    })
</script>
