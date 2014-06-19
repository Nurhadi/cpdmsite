$(document).ready(function(){
	var base_url = "<?php echo base_url();?>";

	// data table
	$('#berita').dataTable();

	// redactor
	$('#redactor').redactor({
		focus: true,
		minHeight: 125
	});

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
			url: "page/update_page_title",
			data: {page_id: 1, title: title},
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
			url: "page/update_page_keywords",
			data: {page_id: 1, keywords: keywords},
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
			url: "page/update_page_description",
			data: {page_id: 1, description: description},
			success:function(data){
				if(data==="success"){
					$("#box-edit-description").hide();
					$("#box-display-keywords description").text(description);
					$("#box-display-description").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// berita
	$("#text-add-berita").click(function(){
		$("#form_action").val("create");
		$("#berita_id").val("");
		$("#box-table-berita").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$(".text-edit-berita").click(function(){
		$("#form_action").val("update");
		var berita_id = $(this).attr("data-berita-id");
		$("#berita_id").val(berita_id);

		$.ajax({
			method: "post",
			url: "berita/edit_berita",
			data: {berita_id: berita_id},
			success:function(data){
				var s = data.split("|");
				$("#title").val(s[0]);
				$("#keywords").val(s[1]);
				$("#description").val(s[2]);
				$("#thumbnail").val(s[3]);
				$(".content").val(s[4]);
				$("#promo").val(s[5]);
				$("#box-table-berita").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-berita").click(function(){
		var berita_id = $(this).attr("data-berita-id");
		var confirmation = confirm("Are you sure you want to delete this berita ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "berita/delete_berita",
				data: {berita_id: berita_id},
				success:function(data){
					if(data==="success"){
						alert("berita deleted");
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-submit-berita").click(function(){
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
				url: "berita/create_new_berita",
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
			var berita_id = $("#berita_id").val();
			$.ajax({
				method: "post",
				url: "berita/update_berita",
				data: {berita_id: berita_id, title: title, keywords: keywords, description: description, thumbnail: thumbnail, content: content, promo: promo},
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

	$("#btn-cancel-berita").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-berita").fadeIn("slow");
		return false;
	});
});