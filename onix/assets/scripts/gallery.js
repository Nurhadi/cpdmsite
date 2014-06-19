$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#gallery').dataTable();

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
			data: {page_id: 3, title: title},
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
			data: {page_id: 3, keywords: keywords},
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
			data: {page_id: 3, description: description},
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

	// gallery
	$("#text-add-gallery").click(function(){
		$("#form_action").val("create");
		$("#gallery_id").val("");
		$("#box-table-gallery").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-gallery").click(function(){
		var title = $('#title').val();
		var form_action = $('#form_action').val();

		if(title === ""){
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

	$("#btn-cancel-gallery").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-gallery").fadeIn("slow");
		return false;
	});
});

function actions(){
	// gallery
	$(".text-detail-gallery").click(function(){
		var gallery_id = $(this).attr("data-gallery-id");

		$.ajax({
			method: "post",
			url: "gallery/detail_gallery",
			data: {gallery_id: gallery_id},
			success:function(data){
				gallery = data.split("|");
				$("#d_gallery_id").text(gallery_id);
				$("#d_title").text(gallery[0]);
				$("#d_created_at").text(gallery[1]);
				$("#box-table-gallery").hide();
				$("#box-detail-gallery").fadeIn("slow");
			}
		});
	});

	$(".text-edit-gallery").click(function(){
		$("#form_action").val("update");
		var gallery_id = $(this).attr("data-gallery-id");
		$("#gallery_id").val(gallery_id);

		$.ajax({
			method: "post",
			url: "gallery/edit_gallery",
			data: {gallery_id: gallery_id},
			success:function(data){
				var s = data.split("|");
				$("#gallery_id").val(gallery_id);
				$("#title").val(s[0]);
				$("#box-table-gallery").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-gallery").click(function(){
		var gallery_id = $(this).attr("data-gallery-id");
		var confirmation = confirm("Are you sure you want to delete this gallery ?")

		if(confirmation === true){
			var second_confirmation = confirm("It will delete all photos related to this gallery, ok ?");
			if(second_confirmation === true){
				$.ajax({
					method: "post",
					url: "gallery/delete_gallery",
					data: {gallery_id: gallery_id},
					success:function(data){
						if(data==="success"){
							alert("gallery deleted");
							window.location.reload();
						}
						else{
							alert("an error occured!");
						}
					}
				});
			}
		}
	});

	$(".text-back-to-table").click(function(){
		$("#d_gallery_id").text("");
		$("#d_title").text("");
		$("#d_created_at").text("");
		$("#box-detail-gallery").hide();
		$("#box-table-gallery").fadeIn("slow");
	});
}