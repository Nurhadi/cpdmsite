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
              <div class="row">
                <div class="col-lg-12">
                  <img src="<?php echo base_url('uploads/news/'.$thumbnail) ;?>" width="100%"/>
                  <h3 style="color:#0D4173; margin-bottom:15px;"><?php echo $title; ?></h3 style="color:#0D4173;">
                  <span style="color:#0D4173;" class="glyphicon glyphicon-list-alt"></span>
                  &nbsp;
                  <span style="color:#0D4173;"><?php echo date('d/m/Y', strtotime($created_at)); ?></span>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <span style="color:#0D4173;" class="glyphicon glyphicon-user"></span>
                  &nbsp;
                  <span style="color:#0D4173;"><?php echo $admin; ?></span>
                  <hr>
                  <p><?php echo $content; ?></p>
                  <div id="box-share" style="margin-top:40px;">
                    <span style="color:#0D4173;">Let's share on&nbsp;</span>
                    <a href="#"><img src="<?php echo base_url('assets/images/fb.png'); ?>" width="30"/></a>&nbsp;
                    <a href="#"><img src="<?php echo base_url('assets/images/tw.png'); ?>" width="30"/></a>&nbsp;
                    <a href="#"><img src="<?php echo base_url('assets/images/gplus.png'); ?>" width="30"/></a>
                  </div>
                  <hr>
                </div>
              </div>
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