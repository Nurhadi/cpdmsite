$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#surat_izin').dataTable();

	/*
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
	*/

	/*
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
	*/

	/*
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
	*/

	// surat_izin
	$("#text-add-surat_izin").click(function(){
		$("#form_action").val("create");
		$("#surat_izin_id").val("");
		$("#box-table-surat_izin").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-surat_izin").click(function(){
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

	$("#btn-cancel-surat_izin").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-surat_izin").fadeIn("slow");
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
	// surat_izin
	$(".text-detail-surat_izin").click(function(){
		var surat_izin_id = $(this).attr("data-surat_izin-id");

		$.ajax({
			method: "post",
			url: "surat_izin/detail_surat_izin",
			data: {surat_izin_id: surat_izin_id},
			success:function(data){
				surat_izin = data.split("|");
				$("#d_surat_izin_id").text(surat_izin_id);
				$("#d_title").text(surat_izin[0]);
				if(surat_izin[1] !== ""){
					$("#d_filename").attr("href", "./../uploads/surat_izin/"+surat_izin[1]);
					$("#d_filename").text(surat_izin[1]);
				}
				$("#d_tanggal_dibuat").text(surat_izin[2]);
				$("#box-table-surat_izin").hide();
				$("#box-detail-surat_izin").fadeIn("slow");
			}
		});
	});

	$(".text-edit-surat_izin").click(function(){
		$("#form_action").val("update");
		var surat_izin_id = $(this).attr("data-surat_izin-id");
		$("#surat_izin_id").val(surat_izin_id);

		$.ajax({
			method: "post",
			url: "surat_izin/edit_surat_izin",
			data: {surat_izin_id: surat_izin_id},
			success:function(data){
				var s = data.split("|");
				$("#surat_izin_id").val(surat_izin_id);
				$("#title").val(s[0]);
				if(s[1] === ""){
					$("#btn-choose-filename").removeAttr("style");
					$("#image-filename").attr("href", "");
					$("#image-filename").hide();
				}
				else{
					$("#btn-choose-filename").css("display","block");
					$("#btn-choose-filename").css("margin","0 auto 10px");
					$("#image-filename").attr("href", "./../uploads/surat_izin/"+s[1]);
					$("#image-filename").text(s[1]);
					$("#image-filename").css("display", "block");
					$("#image-filename").css("margin", "0 auto");
					$("#image-filename").show();
				}

				$("#box-table-surat_izin").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-surat_izin").click(function(){
		var surat_izin_id = $(this).attr("data-surat_izin-id");
		var confirmation = confirm("Are you sure you want to delete this surat_izin ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "surat_izin/delete_surat_izin",
				data: {surat_izin_id: surat_izin_id},
				success:function(data){
					if(data==="success"){
						alert("surat_izin deleted");
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
		$("#d_surat_izin_id").text("");
		$("#d_gallery_id").text("");
		$("#d_title").text("");
		$("#d_link").text("");
		$("#d_filename").attr("src", "");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-surat_izin").hide();
		$("#box-table-surat_izin").fadeIn("slow");
	});
}