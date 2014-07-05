$(document).ready(function(){
	// data table
	$('#slider').dataTable();

	// title
	$("#text-edit-title").click(function(){
		$("#box-display-title").hide();
		$("#box-edit-title").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-title").click(function(){
		$("#box-edit-title").hide();
		$("#box-display-title").fadeIn("slow");
		return false;
	});

	$("#btn-submit-title").click(function(){
		var title = $("#box-edit-title textarea").val();

		$.ajax({
			method: "post",
			url: "homepage/update_homepage_title",
			data: {title: title},
			success:function(data){
				if(data==="success"){
					$("#box-edit-title").hide();
					$("#box-display-title span").text(title);
					$("#box-display-title").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// keywords
	$("#text-edit-keywords").click(function(){
		$("#box-display-keywords").hide();
		$("#box-edit-keywords").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-keywords").click(function(){
		$("#box-edit-keywords").hide();
		$("#box-display-keywords").fadeIn("slow");
		return false;
	});

	$("#btn-submit-keywords").click(function(){
		var keywords = $("#box-edit-keywords textarea").val();

		$.ajax({
			method: "post",
			url: "homepage/update_homepage_keywords",
			data: {keywords: keywords},
			success:function(data){
				if(data==="success"){
					$("#box-edit-keywords").hide();
					$("#box-display-keywords span").text(keywords);
					$("#box-display-keywords").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// description
	$("#text-edit-description").click(function(){
		$("#box-display-description").hide();
		$("#box-edit-description").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-description").click(function(){
		$("#box-edit-description").hide();
		$("#box-display-description").fadeIn("slow");
		return false;
	});

	$("#btn-submit-description").click(function(){
		var description = $("#box-edit-description textarea").val();

		$.ajax({
			method: "post",
			url: "homepage/update_homepage_description",
			data: {description: description},
			success:function(data){
				if(data==="success"){
					$("#box-edit-description").hide();
					$("#box-display-description span").text(description);
					$("#box-display-description").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// facebook
	$("#text-edit-facebook").click(function(){
		$("#box-display-facebook").hide();
		$("#box-edit-facebook").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-facebook").click(function(){
		$("#box-edit-facebook").hide();
		$("#box-display-facebook").fadeIn("slow");
		return false;
	});

	$("#btn-submit-facebook").click(function(){
		var facebook = $("#box-edit-facebook textarea").val();

		$.ajax({
			method: "post",
			url: "homepage/update_homepage_facebook",
			data: {facebook: facebook},
			success:function(data){
				if(data==="success"){
					$("#box-edit-facebook").hide();
					$("#box-display-facebook span").text(facebook);
					$("#box-display-facebook").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// twitter
	$("#text-edit-twitter").click(function(){
		$("#box-display-twitter").hide();
		$("#box-edit-twitter").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-twitter").click(function(){
		$("#box-edit-twitter").hide();
		$("#box-display-twitter").fadeIn("slow");
		return false;
	});

	$("#btn-submit-twitter").click(function(){
		var twitter = $("#box-edit-twitter textarea").val();

		$.ajax({
			method: "post",
			url: "homepage/update_homepage_twitter",
			data: {twitter: twitter},
			success:function(data){
				if(data==="success"){
					$("#box-edit-twitter").hide();
					$("#box-display-twitter span").text(twitter);
					$("#box-display-twitter").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// google-plus
	$("#text-edit-google-plus").click(function(){
		$("#box-display-google-plus").hide();
		$("#box-edit-google-plus").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-google-plus").click(function(){
		$("#box-edit-google-plus").hide();
		$("#box-display-google-plus").fadeIn("slow");
		return false;
	});

	$("#btn-submit-google-plus").click(function(){
		var google_plus = $("#box-edit-google-plus textarea").val();

		$.ajax({
			method: "post",
			url: "homepage/update_homepage_google_plus",
			data: {google_plus: google_plus},
			success:function(data){
				if(data==="success"){
					$("#box-edit-google-plus").hide();
					$("#box-display-google-plus span").text(google_plus);
					$("#box-display-google-plus").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// slider
	$("#text-add-slider").click(function(){
		$("#form_action").val("create");
		$("#slider_id").val("");
		$("#slider_title").val("");
		$("#slider_description").val("");
		$("#image-slider").hide();
		$("#btn-choose-image").removeAttr("style");
		$("#image-slider").attr("src", "");
		$("#image-slider").hide();
		$("#box-table-slider").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$(".text-edit-slider").click(function(){
		$("#form_action").val("update");
		var slider_id = $(this).attr("data-slider-id");
		$("#slider_id").val(slider_id);

		$.ajax({
			method: "post",
			url: "homepage/edit_slider",
			data: {slider_id: slider_id},
			success:function(data){
				var s = data.split("|");
				$("#slider_title").val(s[0]);
				$("#slider_description").val(s[1]);
				$("#slider_path").text(s[2]);
				if(s[2] === ""){
					$("#btn-choose-image").removeAttr("style");
					$("#image-slider").attr("src", "");
					$("#image-slider").hide();
				}
				else{
					$("#btn-choose-image").css("display","block");
					$("#btn-choose-image").css("margin","0 auto 10px");
					$("#image-slider").attr("src", "./../uploads/slider/" + s[2]);
					$("#image-slider").show();
				}
				$("#status").val(s[3]);
				$("#box-table-slider").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-slider").click(function(){
		var slider_id = $(this).attr("data-slider-id");
		var confirmation = confirm("Are you sure you want to delete this slider ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "homepage/delete_slider",
				data: {slider_id: slider_id},
				success:function(data){
					if(data==="success"){
						alert("slider deleted");
						window.location.reload();
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-submit-slider").click(function(){
		var slider_title = $('#slider_title').val();
		var slider_description = $('#slider_description').val();
		var slider_path = $('#slider_path').val();
		var status = $('#status').val();
		var form_action = $('#form_action').val();

		if(slider_title === "" || slider_description === "" || status === "" || form_action === ""){
			$(".alert").slideDown();
			setTimeout(function(){
				$(".alert").slideUp();
			}, 3000);
			return false;
		}
		else{
			return true;
		}
	});

	$("#btn-cancel-slider").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-slider").fadeIn("slow");
		return false;
	});

	$(".text-detail-slider").click(function(){
		var slider_id = $(this).attr("data-slider-id");

		$.ajax({
			method: "post",
			url: "homepage/detail_slider",
			data: {slider_id: slider_id},
			success:function(data){
				slider = data.split("|");
				$("#d_slider_title").text(slider[0]);
				$("#d_slider_description").text(slider[1]);
				if(slider[14] !== ""){
					$("#d_slider_path").attr("src", "./../uploads/slider/"+slider[2]);
				}
				$("#d_status").text(slider[3]);
				$("#d_tanggal_dibuat").text(slider[4]);
				$("#box-table-slider").hide();
				$("#box-detail-slider").fadeIn("slow");
			}
		});
	});

	$(".btn-choose-slider").click(function(){
		$("#slider_path").click();
		return false;
	});

	$(".text-back-to-table").click(function(){
		$("#box-detail-slider").hide();
		$("#box-table-slider").fadeIn("slow");
		return false;
	});
});