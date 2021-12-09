<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="card borderless-card">
                        <div class="card-block rounded shadow-lg info-breadcrumb">
                            <div class="breadcrumb-header">
                              <h4>Job Details</h4>
                              <span>Showing Job Details for <?php print $fetched_job_no; ?></span>
                            </div>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="">Job Details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!-- Page-header end -->

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!--profile cover start-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cover-profile">
                                    <div class="profile-bg-img">
                                        <img class="profile-bg-img img-fluid" src="<?php base_url("assets/air/assets/images/user-profile/bg-img1.jpg")?>" alt="bg-img">
                                        <div class="card-block user-info">
                                            <div class="col-md-12">
                                                <div class="media-left">
                                                    <a href="#" class="profile-image">
                                                        <img class="user-img img-radius" src="<?php base_url("assets/air/assets/images/user-profile/user-img.jpg")?>" style="width:150px" alt="user-img">
                                                    </a>
                                                </div>
                                                <div class="media-body row">
                                                    <div class="col-lg-12">
                                                        <div class="user-title">
                                                            <h2>Job No. <?php print $fetched_job_no; ?></h2>
                                                            <span class="text-white"><?php print $fetched_complete == 1 ? "Completed" : "Incomplete"; ?></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="pull-right cover-btn">
                                                            <?php print $fetched_complete == 1 ? '<form action="'.BASE_URL.'dashboard/view_job/close" method="POST"><button type="button" class="btn btn-primary shadow-lg waves-effect rounded" title="This job has already been completed"><i class="icofont icofont-ui-check"></i> Job Completed</button></form>' : '<form action="'.BASE_URL.'dashboard/view_job/close" method="POST"><button type="button" class="btn btn-primary shadow-lg waves-effect rounded" data-toggle="modal" data-target="#confirm"><i class="icofont icofont-ui-check"></i> Confirm</button></form>'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php Response()?>
                        <!-- Modal small-->
                        <div class="modal fade" id="confirm" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Job Completion</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-small="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure Job No. <b><?php print $fetched_job_no; ?></b> has been Completed?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">No</button>
                                        <form action="<?php base_url('dashboard/view_job/close/'. simple_encrypt($fetched_job_no)) ?>" method="POST">
                                        <button type="submit" class="btn btn-danger waves-effect " name="v_complete">Yes</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!--profile cover end-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- tab header start -->
                                <div class="tab-header card">
                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Job Info</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Documents</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#process" role="tab">Operation Log</a>
                                            <div class="slide"></div>
                                        </li>
                                            <div class="slide"></div>
                                        </li>
                                        <?php if(call_sess(USER_SESSION,'user_role') == 'Manager' || call_sess(USER_SESSION,'user_role') == 'Admin'): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cost" role="tab"><?php print call_sess(USER_SESSION, "showText") ?></a>
                                            <div class="slide"></div>
                                        </li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                                <!-- tab header end -->
                                <!-- tab content start -->
                                <div class="tab-content">
                                    <!-- tab panel personal start -->
                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                        <!-- personal card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">About Job</h5>
                                                <button id="edit-btn" type="button" style="margin-left:20px" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                <i class="icofont icofont-edit"></i>
                                            </button>
                                            <?php if(call_sess(USER_SESSION,'user_role') == 'Admin'): ?>
                                            <a href="<?php base_url('dashboard/view_job/delete_job/'. simple_encrypt($fetched_job_no)) ?>" id="delete-btn" class="btn btn-sm btn-danger waves-effect waves-light f-right" onclick="javascript: return confirm('You are about to delete a job')"><i class="icofont icofont-trash"></i> Delete Job</a>
                                            <?php endif ?>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-xl-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table m-0">
                                                                                <tbody>
                                                                                    <?php if(call_sess(USER_SESSION,'user_role') == 'Admin'): ?>
                                                                                    <tr>
                                                                                        <th scope="row">Job No</th>
                                                                                        <td><?php print $fetched_job_no; ?></td>
                                                                                    </tr>
                                                                                    <?php endif ?>
                                                                                    <tr>
                                                                                        <th scope="row">DATE</th>
                                                                                        <td><?php print $fetched_date; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">ETA</th>
                                                                                        <td><?php print $fetched_eta; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">DELAY</th>
                                                                                        <td><?php print $fetched_delay; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">CLIENT</th>
                                                                                        <td><?php print $fetched_client; ?> - <a href="<?php base_url('dashboard/view_client/client/'.$fetched_client) ?>" target="_blank" class="btn btn-primary">View Client</a></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">CNE</th>
                                                                                        <td><?php print $fetched_cne; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">ORIG</th>
                                                                                        <td><?php print $fetched_orig; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">AGENT</th>
                                                                                        <td><?php print $fetched_agent; ?></td>
                                                                                    </tr>
                                                                                    
                                                                                    <tr>
                                                                                        <th scope="row">REMARK</th>
                                                                                        <td>
                                                                                            <div style="white-space:normal">
                                                                                                <?php print $fetched_remark; ?>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                    <div class="col-lg-12 col-xl-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">MAWB</th>
                                                                                        <td><?php print $fetched_mawb; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">COMMODITY</th>
                                                                                        <td><?php print $v_commodity; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">JOB TYPE</th>
                                                                                        <td><?php print $job_type; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">CLEARING PAYMENT</th>
                                                                                        <td><?php print $fetched_mawbstat; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">QTY</th>
                                                                                        <td><?php print $fetched_qty; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">AL</th>
                                                                                        <td><?php print $fetched_al; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">GW</th>
                                                                                        <td><?php print $fetched_gw; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">CW</th>
                                                                                        <td><?php print $fetched_cw; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">IN#</th>
                                                                                        <td><?php print $fetched_in; ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of general info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of view-info -->
                                                <div class="edit-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                      <form action="<?php base_url('dashboard/view_job/update_job/'.getval()[2]) ?>" method="POST">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <?php if(call_sess(USER_SESSION,'user_role') == 'Admin'): ?>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">JOB No</small>
                                                                                          <input type="text" name="v_job_no" class="form-control" placeholder="eg. VLN1712-0024LOG" value="<?php print $fetched_job_no; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php endif ?>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">DATE</small>
                                                                                          <input type="text" name="v_date" class="form-control" placeholder="YYYY-mm-dd" value="<?php print $fetched_date; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">ETA</small>
                                                                                          <input type="text" name="v_eta" class="form-control" placeholder="YYYY-mm-dd" value="<?php print $fetched_eta; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">DELAY</small>
                                                                                          <input type="text" name="v_delay" class="form-control" placeholder="enter delay" value="<?php print $fetched_delay; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12 mb-3">
                                                                                            <small class="col-lable">Client</small>
                                                                                            <select name="v_client" class="form-control" required>
                                                                                                <option value="">--Select--</option>
                                                                                                <?php foreach($clients as $client): ?>
                                                                                                    <option value="<?php print $client['client_short_name'] ?>" <?php print $fetched_client == $client['client_short_name'] ? 'selected="selected"' : NULL ?>><?php print ucfirst($client['client_full_name']) ?></option>
                                                                                                <?php endforeach ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">CNE</small>
                                                                                          <input type="text" name="v_cne" class="form-control" placeholder="enter cne" value="<?php print $fetched_cne; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">ORIG</small>
                                                                                          <input type="text" name="v_orig" class="form-control" placeholder="enter orig" value="<?php print $fetched_orig; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">AGENT</small>
                                                                                          <input type="text" name="v_agent" class="form-control" placeholder="enter agent" value="<?php print $fetched_agent; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">REMARK</small>
                                                                                          <input type="text" name="v_remarks" class="form-control" placeholder="enter remark" value="<?php print $fetched_remark; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                    <div class="col-lg-6">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">MAWB</small>
                                                                                          <input type="text" name="v_mawb" class="form-control" placeholder="enter mawb" value="<?php print $fetched_mawb; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">Commodity</small>
                                                                                          <input type="text" name="v_commodity" class="form-control" placeholder="enter commodity" value="<?php print $v_commodity; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="col-sm-12 mb-3">
                                                                                            <small class="col-lable">Job Type</small>
                                                                                            <select name="job_type" class="form-control">
                                                                                                <option value="">--Select--</option>
                                                                                                <option value="consolidation - air" <?php print strtolower($job_type) == 'consolidation - air' ? 'selected="selected"' : NULL ?>>Consolidation - Air</option>
                                                                                                <option value="consolidation - sea" <?php print strtolower($job_type) == 'consolidation - sea' ? 'selected="selected"' : NULL ?>>Consolidation - Sea</option>
                                                                                                <option value="air freight" <?php print strtolower($job_type) == 'air freight' ? 'selected="selected"' : NULL ?>>Air Freight</option>
                                                                                                <option value="sea freight" <?php print strtolower($job_type) == 'sea freight' ? 'selected="selected"' : NULL ?>>Sea Freight</option>
                                                                                                <option value="other" <?php print strtolower($job_type) == 'other' ? 'selected="selected"' : NULL ?>>Other</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">CLEARING PAYMENT</small>
                                                                                          <input type="text" name="v_mawbstat" class="form-control" placeholder="enter qty" value="<?php print $fetched_mawbstat; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                                                    <input type="text" class="form-control" placeholder="Twitter Id">
                                                                </div>
                                                            </td>
                                                        </tr> -->               <tr>
                                                                                  <td>
                                                                                    <div class="col-sm-12">
                                                                                      <small class="col-lable">AL</small>
                                                                                        <input type="text" name="v_al" class="form-control" placeholder="enter al" value="<?php print $fetched_al; ?>">
                                                                                    </div>
                                                                                  </td>
                                                                              </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">GW</small>
                                                                                          <input type="text" name="v_gw" class="form-control" placeholder="enter gw" value="<?php print $fetched_gw; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">CW</small>
                                                                                          <input type="text" name="v_cw" class="form-control" placeholder="enter cw" value="<?php print $fetched_cw; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">QTY</small>
                                                                                          <input type="text" name="v_qty" class="form-control" placeholder="enter " value="<?php print $fetched_qty; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                      <div class="col-sm-12">
                                                                                        <small class="col-lable">IN#</small>
                                                                                          <input type="text" name="v_in" class="form-control" placeholder="enter in" value="<?php print $fetched_in; ?>">
                                                                                      </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                </div>
                                                                <!-- end of row -->
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20 pl-4 pr-4">Save</button>
                                                                    <a href="" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                                                </div>
                                                                </form>
                                                            </div>
                                                            <!-- end of edit info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of edit-info -->
                                            </div>
                                            <!-- end of card-block -->
                                        </div>

                                        <!-- personal card end-->
                                    </div>
                                    <!-- tab pane personal end -->
                                    <!-- Coststart -->
                                    <!-- tab panel personal start -->
                                    <div class="tab-pane" id="cost" role="tabpanel">
                                        <!-- personal card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text"><?php print call_sess(USER_SESSION, "showText") ?></h5>
                                                <form id="pay" action="<?php base_url('dashboard/view_job/update_cost/'. simple_encrypt($fetched_job_no)) ?>" method="POST">
                                                <?php print call_sess(USER_SESSION, "showBtn") ?>
                                                </form>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col" <?php print call_sess(USER_SESSION, "cost") ?>>
                                                                        <div class="table-responsive">
                                                                            <h3>Cost Price</h3>
                                                                            <table class="table m-0">
                                                                                <tbody>

                                                                                    <tr>
                                                                                        <th scope="row">Clearance</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-costs" id="clearance" name="v_cclearance" value="<?php print $fetched_cclearance; ?>" ></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Duty handling</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-costs" id="duty" name="v_cdutyhandling" value="<?php print $fetched_cdutyhandling; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Delivery Cost</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-costs" id="delivery" name="v_cdeliverycost" value="<?php print $fetched_cdeliverycost; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">NAFDAC</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-costs" id="nafdac" name="v_cnafdac" value="<?php print $fetched_cnafdac; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Other</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-costs" id="other" name="v_cother" value="<?php print $fetched_cother; ?>"></td>
                                                                                    </tr>
                                                                                  <tr>
                                                                                      <th scope="row">Door to Door</th>
                                                                                      <td><input type="number" min="0" form="pay" class="form-control add-costs" id="costsdoor" name="v_cdoortodoor" value="<?php print $fetched_cdeliverycost; ?>"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <th scope="row">Cost</th>
                                                                                      <td><input type="number" min="0" form="pay" class="form-control" id="costs" name="v_cost" value="<?php print $fetched_cost; ?>" readonly></td>
                                                                                  </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                    <div class="col" <?php print call_sess(USER_SESSION, "selling") ?>>
                                                                        <div class="table-responsive">
                                                                            <h3>Selling Price</h3>
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">Document Handling Fee</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-selling" id="doc_h_fee" name="doc_h_fee" value="<?php print $fetched_doc_h_fee; ?>" required ></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Door to Door</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-selling" id="doortodoor" name="v_sdoortodoor" value="<?php print $fetched_sdoortodoor; ?>" ></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Port to Door</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-selling" id="porttodoor" name="v_sporttodoor" value="<?php print $fetched_sporttodoor; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Clearance</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-selling" id="clearances" name="v_sclearance" value="<?php print $fetched_sclearance; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Miscellenous</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-selling" id="miscellenous" name="v_smiscellenous" value="<?php print $fetched_smiscellenous; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Delivery / Transportation</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control add-selling" id="deliveryt" name="v_sdelivery" value="<?php print $fetched_sdelivery; ?>"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Selling</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control" id="seller" name="v_selling" value="<?php print $fetched_selling; ?>" readonly></td>
                                                                                    </tr>
                                                                                    <tr <?php print call_sess(USER_SESSION, "job_profit") ?>>
                                                                                        <th scope="row">Profit</th>
                                                                                        <td><input type="number" min="0" form="pay" class="form-control" id="profit" name="v_profit" value="<?php print $fetched_profit; ?>" readonly></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of general info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>

                                            </div>
                                            <!-- end of card-block -->
                                        </div>

                                        <!-- personal card end-->
                                    </div>
                                    <!-- tab pane personal end -->
                                    <!-- Cost end -->

                                    <!-- tab pane info end -->
                                    <!-- tab pane contact start -->
                                    <div class="tab-pane" id="contacts" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Uplaod</h5>
                                                            </div>
                                                            <form action="<?php base_url('dashboard/view_job/new_upload/'.$fetched_job_no) ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="card-block">
                                                                <div class="sub-title">I am uploading:</div>
                                                                <select class="form-control" name="new_doctype">
                                                                  <option>Air Waybill</option>
                                                                  <option>Packing List</option>
                                                                  <option>Proforma Invoice</option>
                                                                  <option>Commercial Invoice</option>
                                                                  <option>CCVO</option>
                                                                  <option>Soncap</option>
                                                                  <option>MSDS</option>
                                                                  <option>UN38.3</option>
                                                                  <option>Gatepass</option>
                                                                  <option>Nafdac</option>
                                                                  <option>Duty</option>
                                                                  <option>Assessment</option>
                                                                  <option>Paar</option>
                                                                  <option>Manufacturer certificate</option>
                                                                  <option>Form M</option>
                                                                  <option>POD</option>
                                                                  <option>BI(Billing Information)</option>
                                                                  <option>Other</option>
                                                                </select>
                                                            </div>
                                                            <div class="card-block">
                                                                <input type="file" name="new_doc">
                                                            </div>
                                                            <div class="card-block">
                                                                <button type="submit" name="new_fileupload" class="btn btn-info m-r-10 rounded shadow-lg"> <i class="icofont icofont-upload"></i> Upload</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Other Documents Uplaod</h5>
                                                            </div>
                                                            <form action="<?php base_url('dashboard/view_job/new_othername/'.$fetched_job_no) ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="card-block">
                                                                <div class="sub-title">I am uploading:</div>
                                                                <input type="text" class="form-control" name="new_othername" placeholder="Document name">
                                                            </div>
                                                            <div class="card-block">
                                                                <input type="file" name="new_otherdoc">
                                                            </div>
                                                            <div class="card-block">
                                                                <button type="submit" name="new_other" class="btn btn-info m-r-10 rounded shadow-lg"> <i class="icofont icofont-upload"></i> Upload</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Documents Uploaded</h5>
                                                            </div>
                                                            <!-- docx -->
                                                            <?php if(empty($docx)): ?>
                                                                <div class="row no-gutters px-20 py-15">
                                                                    <div class="col-12 col-sm-12 box-title p-5">
                                                                        No available document for this job.
                                                                    </div>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="row pl-3 pr-3">
                                                                    
                                                               
                                                                <?php foreach($docx as $doc): ?>

                                                                
                                                                <div class="col-xl-3 col-md-6">
                                                                  <div class="card">
                                                                      <div class="card-block">
                                                                          <div class="row align-items-center">
                                                                              <div class="col-8">
                                                                                  <h6 class="text-c-yellow f-w-600"><?php print $doc['v_doctype'] ?></h6>
                                                                                  <small class="text-muted m-b-0">Uploaded by <?php print $doc['v_by'] ?></small>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="card-footer bg-c-yellow">
                                                                          <div class="row align-items-center">
                                                                              <div class="col-9">
                                                                                <a href="<?php base_url('uploads/document/'.$doc['v_doc'])?>" target="_blank"><p class="text-white m-b-0">Open Document</p></a>
                                                                              </div>
                                                                          </div>

                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            


                                                                <?php $i++; endforeach ?>
                                                                 </div>
                                                                <?php endif ?>
                                                            <!-- end -->
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- tab pane contact end -->
                                    <div class="tab-pane" id="process" role="tabpanel">
                                        <!-- personal card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Operation Log</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-xl-12 m-b-30">
                                                                        <form id="joblog" action="<?php base_url('dashboard/view_job/update_log/'. simple_encrypt($fetched_job_no)) ?>" method="POST">
                                                
                                                                        <div class="checkbox-zoom zoom-warning">
                                                                            <label>
                                                                                <input type="checkbox" name="v_awarded" <?php print $fetched_awarded  == 1 ? 'checked' : NULL?> >
                                                                                <span class="cr">
                                                                                    <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                                                                </span>
                                                                                <span>Awarded</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-zoom zoom-warning">
                                                                            <label>
                                                                                <input type="checkbox" name="v_underclearance" <?php print $fetched_underclearance  == 1 ? 'checked' : NULL?>>
                                                                                <span class="cr">
                                                                                    <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                                                                </span>
                                                                                <span>Under Clearance</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-zoom zoom-warning">
                                                                            <label>
                                                                                <input type="checkbox" name="v_document" <?php print $fetched_document  == 1 ? 'checked' : NULL?> >
                                                                                <span class="cr">
                                                                                    <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                                                                </span>
                                                                                <span>Documents</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-zoom zoom-warning">
                                                                            <label>
                                                                                <input type="checkbox" name="v_cleared" <?php print $fetched_cleared  == 1 ? 'checked' : NULL?>>
                                                                                <span class="cr">
                                                                                    <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                                                                </span>
                                                                                <span>Cleared</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-zoom zoom-warning">
                                                                            <label>
                                                                                <input type="checkbox" name="v_delivered" <?php print $fetched_delivered  == 1 ? 'checked' : NULL?>>
                                                                                <span class="cr">
                                                                                    <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                                                                </span>
                                                                                <span>Delivered/POD</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-zoom zoom-warning">
                                                                            <label>
                                                                                <input type="checkbox" name="v_invoicebi" <?php print $fetched_invoicebi  == 1 ? 'checked' : NULL?>>
                                                                                <span class="cr">
                                                                                    <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                                                                </span>
                                                                                <span>Invoice/BI</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xl-12 m-b-30">
                                                                        <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                                      <i class="icofont icofont-edit"></i> Save</button>
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                                <!-- end of row -->
                                                                
                                                                
                                                                <hr />
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <canvas id="operationlog-chart" width="400" height="400"></canvas> 
                                                                    </div>
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-7">
                                                                        <h5>Send job progress to client</h5>
                                                                        <br />
                                                                        <form method="POST" action="<?php base_url("dashboard/view_job/sendmail/".simple_encrypt($fetched_job_no)) ?>">
                                                                            <div class="form-group">
                                                                                <input type="email" name="email" placeholder="E-mail" class="form-control" required />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <textarea name="update" class="form-control" rows="12" required readonly><?php print $fetched_job_no ?> Update
                                                                                    
                                                                                    <?php print $fetched_awarded  == 1 ? 'Awarded: Checked' : NULL ?>
                                                                                    <?php print $fetched_underclearance  == 1 ? 'Under Clearance: checked' : NULL ?>
                                                                                    <?php print $fetched_document  == 1 ? 'Documents: checked' : NULL ?>
                                                                                    <?php print $fetched_cleared  == 1 ? 'Cleared: checked' : NULL ?>
                                                                                    <?php print $fetched_delivered  == 1 ? 'Delivered/POD: checked' : NULL ?>
                                                                                    <?php print $fetched_invoicebi  == 1 ? 'Invoice/BI: checked' : NULL ?>
                                                                                </textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-primary">Send Update</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end of general info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                            </div>
                                            <!-- end of card-block -->
                                        </div>
                                    </div>
                                <!-- tab content end -->
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
                    <!-- Main body end -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>













<!-- Warning Section Ends -->

<!-- Required Jquery -->
<script type="text/javascript" src="<?php base_url("assets/air/assets/js/jquery-3.4.1.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-ui/js/jquery-ui.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/popper.js/js/popper.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/bootstrap/js/bootstrap.min.js") ?>"></script>
<!-- jquery slimscroll js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-slimscroll/js/jquery.slimscroll.js") ?>"></script>
<!-- modernizr js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/modernizr/js/modernizr.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/modernizr/js/css-scrollbars.js") ?>"></script>

<!-- Bootstrap date-time-picker js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/assets/pages/advance-elements/moment-with-locales.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/assets/pages/advance-elements/bootstrap-datetimepicker.min.js") ?>"></script>
<!-- Date-range picker js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/bootstrap-daterangepicker/js/daterangepicker.js") ?>"></script>
<!-- Date-dropper js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/datedropper/js/datedropper.min.js") ?>"></script>
<!-- data-table js -->
<script src="<?php base_url("assets/air/bower_components/datatables.net/js/jquery.dataTables.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<script src="<?php base_url("assets/air/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<!-- ck editor -->
<script src="<?php base_url("assets/air/assets/pages/ckeditor/ckeditor.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<!-- echart js -->
<script src="<?php base_url("assets/air/assets/pages/chart/echarts/js/echarts-all.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<!-- jquery file upload js -->
<script src="<?php base_url("assets/air/assets/pages/jquery.filer/js/jquery.filer.min.js") ?>" type="30076f9a1e53b41637eb4d57-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/filer/custom-filer.js") ?>" type="30076f9a1e53b41637eb4d57-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/pages/filer/jquery.fileuploads.init.js") ?>" type="30076f9a1e53b41637eb4d57-text/javascript"></script>
<!-- i18next.min.js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/i18next/js/i18next.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js") ?>"></script>
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/bower_components/jquery-i18next/js/jquery-i18next.min.js") ?>"></script>
<script src="<?php base_url("assets/air/assets/pages/user-profile.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/pcoded.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/vartical-layout.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<script src="<?php base_url("assets/air/assets/js/jquery.mCustomScrollbar.concat.min.js") ?>" type="b063e474e212443b6832ab85-text/javascript"></script>
<!-- Custom js -->
<script type="b063e474e212443b6832ab85-text/javascript" src="<?php base_url("assets/air/assets/js/script.js") ?>"></script>


<script src="<?php base_url("assets/air/ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js") ?>" data-cf-settings="b063e474e212443b6832ab85-|49" defer=""></script>
<script src="<?php base_url("assets/air/ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js") ?>" data-cf-settings="30076f9a1e53b41637eb4d57-|49" defer=""></script>
<script>
  // fhola scripting 101
    
  function DynamicTotal(selector,sum){
      $('.'+selector).each(function(){
            let id = $(this).get(0).id;
            let input_val =  $("#"+id).val();
            if(input_val.length == 0){
              input_val = 0
            }

            sum[$(this).get(0).id] = parseFloat(input_val);
        });
      return sum;
  }
    
  function DynamicAdd(selector, total_selector,this_selector){
        let add_up = 0;
        let sum = new Object();
        let id_vals;
        let total;
        let total_dyn;
        let pro_sum
      
        // get how many el have similar classes, then get their id and and send their value to array
        DynamicTotal(selector,sum);

        let id  = this_selector.get(0).id;
        let input_val =  $("#"+id).val();
        if(input_val.length == 0){
          input_val = 0
        }

        sum[this_selector.get(0).id] = parseFloat(input_val)

        id_vals = Object.values(sum);

        total = id_vals.reduce(addup);

        function addup(total, num) {
          return total+num;
        }

        $('#'+total_selector).val(total);
      
        let sum2 = new Object();
        if(selector == 'add-costs'){
           pro_sum  = DynamicTotal('add-selling',sum2);
        }
        else{
           pro_sum = DynamicTotal('add-costs',sum2);
        }
      
        sum[this_selector.get(0).id] = parseFloat(input_val)

        id_vals = Object.values(pro_sum);

        total_dyn = id_vals.reduce(addup_pro);

        function addup_pro(total_dyn, num) {
          return total_dyn+num;
        }
      
        $('#profit').val(selector == 'add-costs' ? total_dyn-total : total-total_dyn);
  }
    
    
  $(function(){
    $(document).on("keyup",".add-costs",function(){
        DynamicAdd('add-costs', 'costs', $(this));
    })

    $(document).on("change",".add-costs",function(){
        DynamicAdd('add-costs', 'costs', $(this));
    })

    $(document).on("keyup",".add-selling",function(){
        DynamicAdd('add-selling', 'seller', $(this));
    })
      
    $(document).on("change",".add-selling",function(){
        DynamicAdd('add-selling', 'seller', $(this));
    })
  })
</script>

<?php
$sec_taken = 0;
                                                           
$sec_taken += $fetched_awarded == 1 ? 16.66666666666667 : 0;
$sec_taken += $fetched_underclearance  == 1 ? 16.66666666666667 : 0;
$sec_taken += $fetched_document  == 1 ? 16.66666666666667 : 0;
$sec_taken += $fetched_cleared  == 1 ? 16.66666666666667 : 0;
$sec_taken += $fetched_delivered  == 1 ? 16.66666666666667 : 0;
$sec_taken += $fetched_invoicebi  == 1 ? 16.66666666666667 : 0;
                     
// get left over section
$left_sec = (100-ceil($sec_taken)) == -1 ? 0 : 100-ceil($sec_taken);                                                       
?>
<script>
    $(document).ready(function() {
         var data = [{
           data: [<?php print $sec_taken ?>, <?php print $left_sec ?>],
           backgroundColor: [
             "green",
             "white"
           ],
           borderColor: "#fff"
         }];

         var options = {
                plugins: {
                  labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'percentage',

                    // precision for percentage, default is 0
                    precision: 0,

                    // identifies whether or not labels of value 0 are displayed, default is false
                    showZero: false,

                    // font size, default is defaultFontSize
                    fontSize: 28,

                    // font color, can be color array for each data or function for dynamic color, default is defaultFontColor
                    fontColor: '#fff',

                    // font style, default is defaultFontStyle
                    fontStyle: 'normal',

                    // font family, default is defaultFontFamily
                    fontFamily: "'Quicksand', 'Helvetica', 'Arial', sans-serif",

                    // add padding when position is `outside`
                    // default is 2
                    outsidePadding: 4,

                    // add margin of text when position is `outside` or `border`
                    // default is 2
                    textMargin: 4
                  }
                }
              }

         var ctx = document.getElementById("operationlog-chart").getContext('2d');
         var myChart = new Chart(ctx, {
           type: 'pie',
           data: {
            labels: ['',''],
             datasets: data
           },
           options: options
         });
    })
</script>

s