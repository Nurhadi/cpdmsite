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
              <div class="row" style="margin-bottom:30px;">
                <div class="col-lg-4">
                  <img src="<?php echo base_url('uploads/news/sample_news_1.jpg'); ?>" width="100%">
                </div>
                <div class="col-lg-8">
                  <a href="#" style="font-size:1.2em; font-weight:bold; color:#0D4173;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                  </a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                  </p>
                </div>
              </div>
              <div class="row" style="margin-bottom:30px;">
                <div class="col-lg-4">
                  <img src="<?php echo base_url('uploads/news/sample_news_1.jpg'); ?>" width="100%">
                </div>
                <div class="col-lg-8">
                  <a href="#" style="font-size:1.2em; font-weight:bold; color:#0D4173;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                  </a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                  </p>
                </div>
              </div>
              <div class="row" style="margin-bottom:30px;">
                <div class="col-lg-4">
                  <img src="<?php echo base_url('uploads/news/sample_news_1.jpg'); ?>" width="100%">
                </div>
                <div class="col-lg-8">
                  <a href="#" style="font-size:1.2em; font-weight:bold; color:#0D4173;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                  </a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                  </p>
                </div>
              </div>
              <div class="row" style="margin-bottom:30px;">
                <div class="col-lg-4">
                  <img src="<?php echo base_url('uploads/news/sample_news_1.jpg'); ?>" width="100%">
                </div>
                <div class="col-lg-8">
                  <a href="#" style="font-size:1.2em; font-weight:bold; color:#0D4173;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                  </a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                  </p>
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
                      2014 (4)
                    </a>
                  </div>
                  <div class="box-archive" style="margin-top:5px; margin-left:23px;">
                    <a href="#" style="display:block; margin-bottom:5px;">
                      Lorem ipsum dolor sit amet
                    </a>
                    <a href="#" style="display:block; margin-bottom:5px;">
                      Testing Percobaan News Archives
                    </a>
                    <a href="#" style="display:block; margin-bottom:5px;">
                      Lorem ipsum dolor sit amet
                    </a>
                    <a href="#" style="display:block; margin-bottom:5px;">
                      Testing Percobaan News Archives
                    </a>
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