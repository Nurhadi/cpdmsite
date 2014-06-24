<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Page Manager</h1>
					<?php
						if($this->session->flashdata('status'))
						{
							?>
							<p style="color:green; font-weight:bold;" class="text-center">
								<?php echo $this->session->flashdata('status'); ?>
							</p>
							<?php
						}
					?>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
							Page
							<a href="javascript:void(0)" class="text-edit" id="text-add-page">Add</a>
            </div>
            <div class="panel-body">
              <div id="box-table-page" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="page">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
											<th>Name</th>
											<th class="text-center">Keywords</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($pages->result() as $page)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $page->title; ?></td>
													<td><?php echo $page->keywords ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-page-id="<?php echo $page->page_id; ?>" class="text-detail-page">Detail</a> |
														<a href="javascript:void(0)" data-page-id="<?php echo $page->page_id; ?>" class="text-edit-page">Edit</a> |
														<a href="javascript:void(0)" data-page-id="<?php echo $page->page_id; ?>" class="text-delete-page">Delete</a>
													</td>
												</tr>
												<?php
												$i = $i + 1;
											}
										?>
                  </tbody>
                </table>
              </div>

							<div id="box-form-slider" style="display:none; min-height:335px;">
								<?php
									$attributes = array('id' => 'form-slider');
									echo form_open_multipart('page/page_process', $attributes);
								?>
									<input type="hidden" name="form_action" id="form_action" value="">
									<input type="hidden" name="page_id" id="page_id" value="">
									<p class="text-center alert">Please complete the form!</p>
									<table cellpadding="10" cellspacing="10">
										<tr>
											<td>Title</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="title" id="title"/></td>
										</tr>
										<tr>
											<td>Keywords</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="keywords" id="keywords"/></td>
										</tr>
										<tr>
											<td>Description</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="description" id="description"/></td>
										</tr>
										<tr>
											<td>Thumbnail</td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-default" id="btn-choose-thumbnail" value="Choose Image"/>
												<input type="file" name="thumbnail" style="display:none;" id="thumbnail_path" />
												<img src="" id="image-thumbnail" style="display:none; width:300px; text-align:center;" />
											</td>
										</tr>
										<tr>
											<td>Content</td>
											<td width="100"></td>
											<td><textarea type="text" class="form-control content" id="redactor" name="content"></textarea></td>
										</tr>
										<tr>
											<td></td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-warning" id="btn-cancel-page" value="Cancel">
												<input type="submit" class="btn btn-primary" id="btn-submit-page" value="Submit">
											</td>
										</tr>
									</table>
								</form>
							</div>

              <div id="box-detail-page" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Page</h3>
                <table class="table">
                	<tr><td width="200">ID page</td><td><label id="d_page_id"></label></td></tr>
                	<tr><td>Title</td><td><label id="d_title"></label></td></tr>
                	<tr><td>Keywords</td><td><label id="d_keywords"></label></td></tr>
                	<tr><td>Description</td><td><label id="d_description"></label></td></tr>
                	<tr><td>Thumbnail</td><td><img src="" id="d_thumbnail" width="500"/></td></tr>
                	<tr><td>Content</td><td><label id="d_content"></label></td></tr>
                	<tr>
                		<td></td>
                		<td>
                			<a href="javascript:void(0)" class="text-back-to-table btn btn-warning">Kembali ke Tabel</a>
                		</td>
                	</tr>
                </table>
              </div>

            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

  <script>
    $(document).ready(function() {
      $('#dataTables-example').dataTable();
    });
  </script>

<script type="text/javascript" src="<?php echo base_url('assets/scripts/page.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>