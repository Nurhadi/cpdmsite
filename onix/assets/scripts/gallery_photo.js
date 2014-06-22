$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#gallery_photo').dataTable();

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
			data: {page_id: 4, title: title},
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
			data: {page_id: 4, keywords: keywords},
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
			data: {page_id: 4, description: description},
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

	// gallery_photo
	$("#text-add-gallery_photo").click(function(){
		$("#form_action").val("create");
		$("#gallery_photo_id").val("");
		$("#box-table-gallery_photo").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-gallery_photo").click(function(){
		var title = $('#title').val();
		var keywords = $('#keywords').val();
		var description = $('#description').val();
		var form_action = $('#form_action').val();
		if(form_action === "create"){
			var content = $('.content').val();
		}
		else if(form_action === "update"){
			var content = $('.content').html();
		}

		if(title === "" || keywords === "" || description === "" || content === "" || form_action === ""){
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

	$("#btn-cancel-gallery_photo").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-gallery_photo").fadeIn("slow");
		return false;
	});

	$("#btn-choose-thumbnail").click(function(){
		$("#thumbnail_path").click();
		return false;
	});

	$("#btn-choose-small-thumbnail").click(function(){
		$("#small_thumbnail_path").click();
		return false;
	});
});

function actions(){
	// gallery_photo
	$(".text-detail-gallery_photo").click(function(){
		var gallery_photo_id = $(this).attr("data-gallery_photo-id");

		$.ajax({
			method: "post",
			url: "gallery_photo/detail_gallery_photo",
			data: {gallery_photo_id: gallery_photo_id},
			success:function(data){
				gallery_photo = data.split("|");
				$("#d_gallery_photo_id").text(gallery_photo_id);
				$("#d_title").text(gallery_photo[0]);
				$("#d_keywords").text(gallery_photo[1]);
				$("#d_description").text(gallery_photo[2]);
				if(gallery_photo[3] !== ""){
					$("#d_thumbnail").attr("src", "./../uploads/gallery_photo/"+gallery_photo[3]);
				}
				if(gallery_photo[4] !== ""){
					$("#d_small_thumbnail").attr("src", "./../uploads/gallery_photo/"+gallery_photo[4]);
				}
				$("#d_content").text(gallery_photo[5]);
				$("#d_tanggal_dibuat").text(gallery_photo[6]);
				$("#box-table-gallery_photo").hide();
				$("#box-detail-gallery_photo").fadeIn("slow");
			}
		});
	});

	$(".text-edit-gallery_photo").click(function(){
		$("#form_action").val("update");
		var gallery_photo_id = $(this).attr("data-gallery_photo-id");
		$("#gallery_photo_id").val(gallery_photo_id);

		$.ajax({
			method: "post",
			url: "gallery_photo/edit_gallery_photo",
			data: {gallery_photo_id: gallery_photo_id},
			success:function(data){
				var s = data.split("|");
				$("#gallery_photo_id").val(gallery_photo_id);
				$("#title").val(s[0]);
				$("#keywords").val(s[1]);
				$("#description").val(s[2]);
				if(s[3] === ""){
					$("#btn-choose-thumbnail").removeAttr("style");
					$("#image-thumbnail").attr("src", "");
					$("#image-thumbnail").hide();
				}
				else{
					$("#btn-choose-thumbnail").css("display","block");
					$("#btn-choose-thumbnail").css("margin","0 auto 10px");
					$("#image-thumbnail").attr("src", "./../uploads/gallery_photo/"+s[3]);
					$("#image-thumbnail").css("display", "block");
					$("#image-thumbnail").css("margin", "0 auto");
					$("#image-thumbnail").show();
				}
				if(s[4] === ""){
					$("#btn-choose-small-thumbnail").removeAttr("style");
					$("#image-small-thumbnail").attr("src", "");
					$("#image-small-thumbnail").hide();
				}
				else{
					$("#btn-choose-small-thumbnail").css("display","block");
					$("#btn-choose-small-thumbnail").css("margin","0 auto 10px");
					$("#image-small-thumbnail").attr("src", "./../uploads/gallery_photo/"+s[4]);
					$("#image-small-thumbnail").css("display", "block");
					$("#image-small-thumbnail").css("margin", "0 auto");
					$("#image-small-thumbnail").show();
				}
				$(".redactor_editor").html(s[5]);
				$(".content").html(s[5]);
				$("#tanggal_dibuat").val(s[6]);

				$("#box-table-gallery_photo").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-gallery_photo").click(function(){
		var gallery_photo_id = $(this).attr("data-gallery_photo-id");
		var confirmation = confirm("Are you sure you want to delete this gallery_photo ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "gallery_photo/delete_gallery_photo",
				data: {gallery_photo_id: gallery_photo_id},
				success:function(data){
					if(data==="success"){
						alert("gallery_photo deleted");
						window.location.reload();
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$(".text-back-to-table").click(function(){
		$("#d_gallery_photo_id").text("");
		$("#d_title").text("");
		$("#d_keywords").text("");
		$("#d_description").text("");
		$("#d_thumbnail").attr("src", "");
		$("#d_small_thumbnail").attr("src", "");
		$("#d_content").text("");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-gallery_photo").hide();
		$("#box-table-gallery_photo").fadeIn("slow");
	});
}