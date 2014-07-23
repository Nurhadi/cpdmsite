<?php $this->load->view('header_view'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cpdmsite').dataTable();

    $(".archive-toggle").click(function(){
      $(".box-archive").slideToggle();
      var arrow = "";
      var type = "";
      if($(".arrow-archive").attr("data-type") === "active"){
        arrow = "forward_enabled_hover.png";
        type = "inactive";
      }
      else{
        arrow = "forward_enabled_hover_bottom.png";
        type = "active";
      }
      $(".arrow-archive").attr("src", "<?php echo base_url('assets/images/"+arrow+"'); ?>");
      $(".arrow-archive").attr("data-type", type);
    });
  });
</script>

	<section>


    <div class="container" style="margin-top:10px; margin-bottom:35px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-8">
              <?php if($newss->num_rows() > 0) { ?>
                <?php foreach($newss->result() as $news) { ?>
                  <div class="row" style="margin-bottom:30px;">
                    <div class="col-lg-4">
                      <img src="<?php echo base_url('uploads/news/'.$news->small_thumbnail); ?>" width="100%">
                    </div>
                    <div class="col-lg-8">
                      <a href="<?php echo site_url('news/detail/'.url_title($news->title).'/'.$news->news_id); ?>" style="font-size:1.2em; font-weight:bold; color:#0D4173;">
                        <?php echo $news->title; ?>
                      </a>
                      <p>
                        <?php echo word_limiter(strip_tags($news->content), 50); ?>
                      </p>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
            <div class="col-lg-4">
              <div style="border-bottom:1px solid #ccc; margin-bottom:10px;">
                <p style="font-size:1.3em; font-weight:bold; color:#0D4173;">Archives News</p>
              </div>
              <div class="row" style="margin-bottom:5px;">
                <div class="col-lg-12">
                  <div style="border-bottom:1px solid #ccc; padding-bottom:8px;">
                    <a href="javascript:void(0)" class="archive-toggle">
                      <img src="<?php echo base_url('assets/images/forward_enabled_hover_bottom.png'); ?>" class="arrow-archive" data-type="active"/>
                      2014 (<?php echo $archived_news->num_rows(); ?>)
                    </a>
                  </div>
                  <div class="box-archive" style="margin-top:5px; margin-left:23px;">
                    <?php if($archived_news->num_rows() > 0) { ?>
                      <?php foreach($archived_news->result() as $news) { ?>
                        <a href="<?php echo site_url('news/detail/'.url_title($news->title).'/'.$news->news_id); ?>" style="display:block; margin-bottom:5px;">
                          <?php echo $news->title; ?>
                        </a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

	</section>

<?php $this->load->view('footer_view'); ?>