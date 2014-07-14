$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#download').dataTable();

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
			data: {page_id: 23, title: title},
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
			data: {page_id: 23, keywords: keywords},
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
			data: {page_id: 23, description: description},
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

	// download
	$("#text-add-download").click(function(){
		$("#form_action").val("create");
		$("#download_id").val("");
		$("#box-table-download").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-download").click(function(){
		var title = $('#title').val();
		var form_action = $('#form_action').val();

		if(title === "" || form_action === ""){
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

	$("#btn-cancel-download").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-download").fadeIn("slow");
		return false;
	});

	$("#btn-choose-filename").click(function(){
		$("#filename_path").click();
		return false;
	});

	$("#btn-choose-small-filename").click(function(){
		$("#small_filename_path").click();
		return false;
	});
});

function actions(){
	// download
	$(".text-detail-download").click(function(){
		var download_id = $(this).attr("data-download-id");

		$.ajax({
			method: "post",
			url: "download/detail_download",
			data: {download_id: download_id},
			success:function(data){
				download = data.split("|");
				$("#d_download_id").text(download_id);
				$("#d_title").text(download[0]);
				if(download[1] !== ""){
					$("#d_filename").attr("href", "./../uploads/download/"+download[1]);
					$("#d_filename").text(download[1]);
				}
				$("#d_tanggal_dibuat").text(download[2]);
				$("#box-table-download").hide();
				$("#box-detail-download").fadeIn("slow");
			}
		});
	});

	$(".text-edit-download").click(function(){
		$("#form_action").val("update");
		var download_id = $(this).attr("data-download-id");
		$("#download_id").val(download_id);

		$.ajax({
			method: "post",
			url: "download/edit_download",
			data: {download_id: download_id},
			success:function(data){
				var s = data.split("|");
				$("#download_id").val(download_id);
				$("#title").val(s[0]);
				if(s[1] === ""){
					$("#btn-choose-filename").removeAttr("style");
					$("#image-filename").attr("href", "");
					$("#image-filename").hide();
				}
				else{
					$("#btn-choose-filename").css("display","block");
					$("#btn-choose-filename").css("margin","0 auto 10px");
					$("#image-filename").attr("href", "./../uploads/download/"+s[1]);
					$("#image-filename").text(s[1]);
					$("#image-filename").css("display", "block");
					$("#image-filename").css("margin", "0 auto");
					$("#image-filename").show();
				}

				$("#box-table-download").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-download").click(function(){
		var download_id = $(this).attr("data-download-id");
		var confirmation = confirm("Are you sure you want to delete this download ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "download/delete_download",
				data: {download_id: download_id},
				success:function(data){
					if(data==="success"){
						alert("download deleted");
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
		$("#d_download_id").text("");
		$("#d_gallery_id").text("");
		$("#d_title").text("");
		$("#d_link").text("");
		$("#d_filename").attr("src", "");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-download").hide();
		$("#box-table-download").fadeIn("slow");
	});
}