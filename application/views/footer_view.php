	<div class="text-center" style="height:100px; background:#52BAD5; color:#fff; padding-top:20px;">
		&copy; 2014 CPD-MSITE FPMIPA UPI
	</div>
	<script src="<?php echo base_url('assets/scripts/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/jquery.datetimepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/jquery.validate.js'); ?>"></script>
	<script type="text/javascript">
    $(document).ready(function(){
      $('#datetimepicker').datetimepicker({
      	format:'Y-m-d',
      	timpicker: false
     	});

      $('#form-pendaftaran, #form-upload-bukti-pembayaran').validate({
      	rules: {
      		field: {
      			required: true,
      			digits: true,
      			email: true
      		}
      	}
      });
    });
  </script>
</body>
</html>