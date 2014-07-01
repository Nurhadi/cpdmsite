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
                  <img src="<?php echo base_url('uploads/news/sample_news_1.jpg') ;?>" width="100%"/>
                  <h3 style="color:#0D4173; margin-bottom:15px;">Pentingnya Pendidikan dan Pelatihan Kepemimpinan Laboratorium</h3 style="color:#0D4173;">
                  <span style="color:#0D4173;" class="glyphicon glyphicon-list-alt"></span>
                  &nbsp;
                  <span style="color:#0D4173;">01/02/2014</span>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <span style="color:#0D4173;" class="glyphicon glyphicon-user"></span>
                  &nbsp;
                  <span style="color:#0D4173;">Nurhadi Maulana</span>
                  <hr>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
                  </p>

                  <div id="box-share" style="margin-top:40px;">
                    <span style="color:#0D4173;">Let's share on&nbsp;</span>
                    <a href="#"><img src="<?php echo base_url('assets/images/fb.png'); ?>" width="30"/></a>&nbsp;
                    <a href="#"><img src="<?php echo base_url('assets/images/tw.png'); ?>" width="30"/></a>&nbsp;
                    <a href="#"><img src="<?php echo base_url('assets/images/gplus.png'); ?>" width="30"/></a>
                  </div>
                  <hr>
                </div>
<!--                 <div class="col-lg-4">
                  <img src="<?php echo base_url('uploads/news/sample_news_1.jpg'); ?>" width="100%">
                </div>
                <div class="col-lg-8">
                  <a href="#" style="font-size:1.2em; font-weight:bold; color:#0D4173;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                  </a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                  </p>
                </div> -->
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