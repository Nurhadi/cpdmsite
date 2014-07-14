$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#periode_pelatihan').dataTable();

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
	*/

	// periode_pelatihan
	$("#text-add-periode_pelatihan").click(function(){
		$("#form_action").val("create");
		$("#periode_pelatihan_id").val("");
		$("#box-table-periode_pelatihan").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-periode_pelatihan").click(function(){
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

	$("#btn-cancel-periode_pelatihan").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-periode_pelatihan").fadeIn("slow");
		return false;
	});
});

function actions(){
	// periode_pelatihan
	$(".text-detail-periode_pelatihan").click(function(){
		var periode_pelatihan_id = $(this).attr("data-periode_pelatihan-id");

		$.ajax({
			method: "post",
			url: "periode_pelatihan/detail_periode_pelatihan",
			data: {periode_pelatihan_id: periode_pelatihan_id},
			success:function(data){
				periode_pelatihan = data.split("|");
				$("#d_periode_pelatihan_id").text(periode_pelatihan_id);
				$("#d_title").text(periode_pelatihan[0]);
				$("#d_created_at").text(periode_pelatihan[1]);
				$("#box-table-periode_pelatihan").hide();
				$("#box-detail-periode_pelatihan").fadeIn("slow");
			}
		});
	});

	$(".text-edit-periode_pelatihan").click(function(){
		$("#form_action").val("update");
		var periode_pelatihan_id = $(this).attr("data-periode_pelatihan-id");
		$("#periode_pelatihan_id").val(periode_pelatihan_id);

		$.ajax({
			method: "post",
			url: "periode_pelatihan/edit_periode_pelatihan",
			data: {periode_pelatihan_id: periode_pelatihan_id},
			success:function(data){
				var s = data.split("|");
				$("#periode_pelatihan_id").val(periode_pelatihan_id);
				$("#title").val(s[0]);
				$("#box-table-periode_pelatihan").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-periode_pelatihan").click(function(){
		var periode_pelatihan_id = $(this).attr("data-periode_pelatihan-id");
		var confirmation = confirm("Are you sure you want to delete this periode pelatihan ?")

		if(confirmation === true){
			// var second_confirmation = confirm("It will delete all photos related to this periode pelatihan, ok ?");
			// if(second_confirmation === true){
				$.ajax({
					method: "post",
					url: "periode_pelatihan/delete_periode_pelatihan",
					data: {periode_pelatihan_id: periode_pelatihan_id},
					success:function(data){
						if(data==="success"){
							alert("periode pelatihan deleted");
							window.location.reload();
						}
						else{
							alert("an error occured!");
						}
					}
				});
			// }
		}
	});

	$(".text-back-to-table").click(function(){
		$("#d_periode_pelatihan_id").text("");
		$("#d_title").text("");
		$("#d_created_at").text("");
		$("#box-detail-periode_pelatihan").hide();
		$("#box-table-periode_pelatihan").fadeIn("slow");
	});
}