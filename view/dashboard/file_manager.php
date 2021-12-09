<div class="file-manager-main-layout">
    <div class="fadeInUp animated">
        <div class="font-weight-normal text-size-14 mt-15">Showing All <?php Response(); print ucfirst($file_msg) ?></div>
        <div class="file-list d-flex flex-wrap mt-15">
            <?php if(empty($all_file)): ?>
            <div class="row no-gutters px-20 py-15">
                <div class="col-12 col-sm-12 box-title">
                    No available files
                </div>
            </div>
            <?php else: ?>
            <?php foreach($all_file as $all_files): ?>
            <div class="file w-100 w-sm-46 w-md-30 w-xl-23 px-20 py-10 d-flex rounded position-relative">
                <div class="document fw-87 fh-80">
                    <div class="file-type">.<?php print strtoupper($all_files['v_ext']) ?></div>
                </div>
                <div class="w-50 d-flex flex-column justify-content-center">
                    <div class="file-name font-weight-normal"><?php print strtoupper($all_files['v_fileno']) ?></div>
                    <div class="mt-3 text-muted"><?php print strtoupper($all_files['v_doctype']) ?></div>
                    <div class="mt-3 text-muted"><?php print number_format((float)$all_files['v_size']/1000000, 2, '.', '') ?>MB</div>
                    <div class="position-absolute post-10 posr-12" role="main" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon mdi mdi-dots-vertical text-size-18" aria-hidden="true"></i> 
                        <div class="dropdown-menu"> <a class="dropdown-item" href="<?php base_url('uploads/document/'.$all_files['v_doc']) ?>">View</a> <a class="dropdown-item" href="<?php base_url('dashboard/file_manager/movetoarchive/'.$all_files['id']) ?>">Download</a> <a class="dropdown-item" href="<?php base_url('dashboard/file_manager/movetoarchive/'.$all_files['id']) ?>">Move to Archive</a> <a class="dropdown-item" href="<?php base_url('dashboard/file_manager/movetoarchive/'.$all_files['id']) ?>">Delete</a> </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
                <div class="row no-gutters px-20 py-15 align-items-center">
                    <div class="col-12 col-md-12 mt-20 mt-md-0">
                        <nav aria-label="Pagination">
                            <ul class="pagination no-border justify-content-center justify-content-md-end mb-0">
                                 <?php paginationFooter("dashboard/file_manager/".$file_msg."/docs/", "active", TRUE) ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    Uploading File
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <div class="col-12 col-lg-12 mb-20">
                    <div class="content-box fadeInUp animated">
                        <div class="px-20 pb-20 pt-20">
                            <form id="fileupload" action="<?php base_url('dashboard/file_manager/new_upload') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <small id="textHelp" class="form-text text-muted pb-5">Only Unique <?php print SITENAME ?> file number allowed.</small>
                                    <input type="text" name="new_fileno" class="form-control" id="formGroupExampleInput" placeholder="Enter file number">
                                </div>
                                <div class="form-group">
                                        <small id="textHelp" class="form-text text-muted pb-5">File Type</small>
                                        <select class="form-control" name="new_doctype" id="exampleSelect">
                                            <option>Form M</option>
                                            <option>Insurance</option>
                                            <option>Bill of landing</option>
                                            <option>Commercial</option>
                                            <option>CCVO of Form16</option>
                                            <option>Packing List</option>
                                            <option>Chemical Analysis</option>
                                            <option>Letter Head of Import</option>
                                            <option>Duty Payin</option>
                                            <option>PAAR</option>
                                            <option>NAFDAC Permit</option>
                                            <option>SONCAP</option>
                                            <option>CRIA</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                <small id="textHelp" class="form-text text-muted pb-5">Only file format <code>png, jpg, jepg, pdf, docx, xls, xlsx, crv</code> allowed.</small>
                                <div class="custom-file">
                                    <input type="file" name="new_doc" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="fileupload" name="new_fileupload" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>
<!-- End -->