<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Inbox Manager</h1>
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
							News
							<!-- <a href="javascript:void(0)" class="text-edit" id="text-add-news">Add</a> -->
            </div>
            <div class="panel-body">
              <div id="box-table-inbox" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="inbox">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
											<th>Email</th>
											<th>Subject</th>
											<th class="text-center">Sent at</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($inboxes->result() as $inbox)
											{
												$bold = "";
												if($inbox->status === "unread")
												{
													$bold = "font-weight:bold;";
												}
												?>
												<tr style="<?php echo $bold; ?>">
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $inbox->email; ?></td>
													<td>
														<a href="javascript:void(0)" data-inbox-id="<?php echo $inbox->inbox_id; ?>" class="text-read-inbox"><?php echo $inbox->subject; ?></a>
													</td>
													<td class="text-center"><?php echo $inbox->created_at ?></td>
													<td class="text-center"><?php echo UCFirst($inbox->status) ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-inbox-id="<?php echo $inbox->inbox_id; ?>" class="text-read-inbox">Read</a> |
														<a href="javascript:void(0)" data-inbox-id="<?php echo $inbox->inbox_id; ?>" class="text-delete-inbox">Delete</a>
													</td>
												</tr>
												<?php
												$i = $i + 1;
											}
										?>
                  </tbody>
                </table>
              </div>

							<div id="box-form-slider" style="display:none; min-height:500px;">
								<table cellpadding="10" cellspacing="10">
									<tr>
										<td>Email</td>
										<td width="100"></td>
										<td><label name="email" id="email"></label></td>
									</tr>
									<tr>
										<td>Full Name</td>
										<td width="100"></td>
										<td><label name="fullname" id="fullname"></label></td>
									</tr>
									<tr>
										<td>Subject</td>
										<td width="100"></td>
										<td><label name="subject" id="subject"></label></td>
									</tr>
									<tr>
										<td valign="top">Message</td>
										<td width="100"></td>
										<td><label name="message" id="message"></label></td>
										<!-- <td><input type="text" class="form-control message" id="redactor" name="message"/></td> -->
									</tr>
									<tr>
										<td></td>
										<td width="100"></td>
										<td>
											<input type="button" class="btn btn-warning" id="btn-cancel-inbox" value="Cancel">
											<input type="button" class="btn btn-primary" id="btn-reply-inbox" value="Reply">
										</td>
									</tr>
								</table>

								<div id="box-form-inbox-reply" style="display:none;">
									<hr>
									<h3>Reply Inbox</h3>
									<?php echo form_open('inbox/reply_inbox'); ?>
										<input type="hidden" name="inbox_id" id="inbox_id" value="">
										<table cellpadding="10" cellspacing="10">
											<tr>
												<td>Subject</td>
												<td width="130"></td>
												<td><input type="text" class="form-control" id="subject" name="subject"/></td>
											</tr>
											<tr>
											<tr>
												<td>Content</td>
												<td width="130"></td>
												<td><textarea class="form-control content" id="redactor" name="content"></textarea></td>
											</tr>
											<tr>
												<td></td>
												<td width="130"></td>
												<td>
													<input type="button" class="btn btn-warning" id="btn-cancel-form-reply" value="Cancel">
													<input type="submit" class="btn btn-primary" id="btn-submit-reply-inbox" value="Submit">
												</td>
											</tr>
										</table>
									</form>
								</div>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/inbox.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>