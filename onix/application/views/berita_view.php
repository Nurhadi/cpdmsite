<?php $this->load->view("header_view"); ?>

		<div id="container-admin" class="row">

			<?php $this->load->view("sidebar_view"); ?>

			<div class="col-md-10 pad-bottom-20">
				<p class="mar-top-10 text-center">Berita</p>
				<div class="row mar-top-10">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Page Title
							<a href="javascript:void(0)" class="text-edit" id="text-edit-title">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-title">
								<span class="text-title">
									<?php echo $title; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-title" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $title; ?></textarea>
								<input type="button" id="btn-submit-title" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-title" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Dental Zone Administrator
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-blank">
								<div class="text-center">
									<img src="<?php echo base_url('assets/images/upi.png');?>" width="100"/>
								</div>
							</div>
							<div class="height-type-1" id="box-edit-blank" style="display:none;">
								<input type="file" style="display:none;" />
								<div class="height-type-1 text-center">
									<input type="button" class="btn btn-lg btn-default btn-choose-file text-center" value="Choose Image"/>
								</div>
								<input type="button" id="btn-submit-blank" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-blank" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Meta Keywords
							<a href="javascript:void(0)" class="text-edit" id="text-edit-keywords">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-keywords">
								<span class="text-normal">
									<?php echo $keywords; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-keywords" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $keywords; ?></textarea>
								<input type="button" id="btn-submit-keywords" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-keywords" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Meta Description
							<a href="javascript:void(0)" class="text-edit" id="text-edit-description">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-description">
								<span class="text-normal">
									<?php
										$meta_description_limited = character_limiter($description, 165);
										echo $meta_description_limited;
									?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-description" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $description; ?></textarea>
								<input type="button" id="btn-submit-description" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-description" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-12 box-full">
						<div class="box-title">
							Berita
							<a href="javascript:void(0)" class="text-edit" id="text-add-berita">Add</a>
						</div>
						<div class="box-content clearfix">
							<div id="box-table-berita" style="min-height:335px;">
								<table class="display" id="berita" width="100%">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th>Title</th>
											<th class="text-center">Created at</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($beritas->result() as $berita)
											{
												?>
												<tr>
													<td class="center"><?php echo $i; ?></td>
													<td><?php echo $berita->title; ?></td>
													<td class="center"><?php echo $berita->created_at ?></td>
													<td class="center">
														<a href="javascript:void(0)" data-berita-id="<?php echo $berita->berita_id; ?>" class="text-edit-berita">Edit</a> |
														<a href="javascript:void(0)" data-berita-id="<?php echo $berita->berita_id; ?>" class="text-delete-berita">Delete</a>
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
								<input type="hidden" name="action" id="form_action" value="">
								<input type="hidden" name="berita_id" id="berita_id" value="">
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
											<input type="button" class="btn btn-default" id="btn-choose-image" value="Choose Image"/>
											<input type="file" style="display:none;" id="thumbnail" />
										</td>
									</tr>
									<tr>
										<td>Content</td>
										<td width="100"></td>
										<td><input type="text" class="form-control content" id="redactor" name="content"/></td>
									</tr>
									<tr>
										<td>Promo</td>
										<td width="100"></td>
										<td>
											<select class="form-control" id="promo">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td width="100"></td>
										<td>
											<input type="button" class="btn btn-warning" id="btn-cancel-berita" value="Cancel">
											<input type="button" class="btn btn-primary" id="btn-submit-berita" value="Submit">
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row mar-top-10 mar-bottom-10">
			<div class="col-md-12 text-center">Invinity Technologies Administrator Version 1.0</div>
		</div>
	</div>

<script type="text/javascript" src="<?php echo base_url('assets/scripts/berita.js');?>"></script>

<?php $this->load->view("footer_view"); ?>