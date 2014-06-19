$(document).ready(function(){
	var base_url = "<?php echo base_url();?>";

	// data table
	$('#inbox').dataTable();

	// redactor
	$('#redactor').redactor({
		focus: true,
		minHeight: 125
	});

	// inbox
	$(".text-read-inbox").click(function(){
		$("#inbox_id").val($(this).attr("data-inbox-id"));
		$("#box-table-inbox").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$(".text-read-inbox").click(function(){
		var inbox_id = $(this).attr("data-inbox-id");
		$("#inbox_id").val(inbox_id);

		$.ajax({
			method: "post",
			url: "inbox/get_data_inbox",
			data: {inbox_id: inbox_id},
			success:function(data){
				var s = data.split("|");
				$("#email").text(s[0]);
				$("#fullname").text(s[1]);
				$("#subject").text(s[2]);
				$("#message").text(s[3]);
				$("#box-table-inbox").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-inbox").click(function(){
		var inbox_id = $(this).attr("data-inbox-id");
		var confirmation = confirm("Are you sure you want to delete this inbox ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "inbox/delete_inbox",
				data: {inbox_id: inbox_id},
				success:function(data){
					if(data==="success"){
						alert("inbox deleted");
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-reply-inbox").click(function(){
		$("#box-form-inbox-reply").fadeIn("slow");
	});

	$("#btn-submit-news").click(function(){
		var title = $('#title').val();
		var keywords = $('#keywords').val();
		var description = $('#description').val();
		var thumbnail = $('#thumbnail').val();
		var content = $('.content').val();
		var promo = $('#promo').val();
		var form_action = $('#form_action').val();

		if(form_action === "create"){
			$.ajax({
				method: "post",
				url: "news/create_new_news",
				data: {title: title, keywords: keywords, description: description, thumbnail: thumbnail, content: content, promo: promo},
				success:function(data){
					if(data==="success"){
						alert("success");
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
		else{
			var news_id = $("#news_id").val();
			$.ajax({
				method: "post",
				url: "news/update_news",
				data: {news_id: news_id, title: title, keywords: keywords, description: description, thumbnail: thumbnail, content: content, promo: promo},
				success:function(data){
					if(data==="success"){
						alert("success");
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-cancel-inbox").click(function(){
		window.location.reload();
		// $("#box-form-slider").hide();
		// $("#box-table-inbox").fadeIn("slow");
		// return false;
	});

	$("#btn-cancel-form-reply").click(function(){
		$("#box-form-inbox-reply").fadeOut();
		return false;
	});
});