$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#page').dataTable();

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
			data: {page_id: 2, title: title},
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
			data: {page_id: 2, keywords: keywords},
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
			data: {page_id: 2, description: description},
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

	// page
	$("#text-add-page").click(function(){
		$("#form_action").val("create");
		$("#page_id").val("");
		$("#box-table-page").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-page").click(function(){
		var title = $('#title').val();
		var keywords = $('#keywords').val();
		var description = $('#description').val();
		var form_action = $('#form_action').val();
		// if(form_action === "create"){
		// 	var content = $('.content').val();
		// }
		// else if(form_action === "update"){
		// 	var content = $('.content').html();
		// }

		if(title === "" || keywords === "" || description === "" || form_action === ""){
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

	$("#btn-cancel-page").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-page").fadeIn("slow");
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
	// page
	$(".text-detail-page").click(function(){
		var page_id = $(this).attr("data-page-id");

		$.ajax({
			method: "post",
			url: "page/detail_page",
			data: {page_id: page_id},
			success:function(data){
				page = data.split("|");
				$("#d_page_id").text(page_id);
				$("#d_title").text(page[0]);
				$("#d_keywords").text(page[1]);
				$("#d_description").text(page[2]);
				$("#d_content").text(page[3]);
				if(page[4] !== ""){
					$("#d_thumbnail").attr("src", "./../uploads/page/"+page[4]);
				}
				$("#box-table-page").hide();
				$("#box-detail-page").fadeIn("slow");
			}
		});
	});

	$(".text-edit-page").click(function(){
		$("#form_action").val("update");
		var page_id = $(this).attr("data-page-id");
		$("#page_id").val(page_id);

		$.ajax({
			method: "post",
			url: "page/edit_page",
			data: {page_id: page_id},
			success:function(data){
				var s = data.split("|");
				$("#page_id").val(page_id);
				$("#title").val(s[0]);
				$("#keywords").val(s[1]);
				$("#description").val(s[2]);
				$(".redactor_editor").html(s[3]);
				$(".content").html(s[3]);
				if(s[4] === ""){
					$("#btn-choose-thumbnail").removeAttr("style");
					$("#image-thumbnail").attr("src", "");
					$("#image-thumbnail").hide();
				}
				else{
					$("#btn-choose-thumbnail").css("display","block");
					$("#btn-choose-thumbnail").css("margin","0 auto 10px");
					$("#image-thumbnail").attr("src", "./../uploads/page/"+s[4]);
					$("#image-thumbnail").css("display", "block");
					$("#image-thumbnail").css("margin", "0 auto");
					$("#image-thumbnail").show();
				}

				$("#box-table-page").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-page").click(function(){
		var page_id = $(this).attr("data-page-id");
		var confirmation = confirm("Are you sure you want to delete this page ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "page/delete_page",
				data: {page_id: page_id},
				success:function(data){
					if(data==="success"){
						alert("page deleted");
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
		$("#d_page_id").text("");
		$("#d_title").text("");
		$("#d_keywords").text("");
		$("#d_description").text("");
		$("#d_thumbnail").attr("src", "");
		$("#d_small_thumbnail").attr("src", "");
		$("#d_content").text("");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-page").hide();
		$("#box-table-page").fadeIn("slow");
	});
}