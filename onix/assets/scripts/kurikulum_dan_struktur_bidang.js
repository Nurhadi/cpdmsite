$(document).ready(function(){
	// include all actions functions
	actions();

	// redactor
	$('#redactor').redactor({
		focus: true,
		minHeight: 125
	});

	// data table
	$('#kurikulum_dan_struktur_bidang').dataTable();

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
			data: {page_id: 27, title: title},
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
			data: {page_id: 27, keywords: keywords},
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
			data: {page_id: 27, description: description},
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

	// kurikulum_dan_struktur_bidang
	$("#text-add-kurikulum_dan_struktur_bidang").click(function(){
		$("#form_action").val("create");
		$("#kurikulum_dan_struktur_bidang_id").val("");
		$("#box-table-kurikulum_dan_struktur_bidang").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-kurikulum_dan_struktur_bidang").click(function(){
		var description = $('#description').val();
		var form_action = $('#form_action').val();

		if(description === ""){
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

	$("#btn-cancel-kurikulum_dan_struktur_bidang").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-kurikulum_dan_struktur_bidang").fadeIn("slow");
		return false;
	});
});

function actions(){
	// kurikulum_dan_struktur_bidang
	$(".text-detail-kurikulum_dan_struktur_bidang").click(function(){
		var kurikulum_dan_struktur_bidang_id = $(this).attr("data-kurikulum-dan-struktur-bidang-id");
		$.ajax({
			method: "post",
			url: "kurikulum_dan_struktur_bidang/detail_kurikulum_dan_struktur_bidang",
			data: {kurikulum_dan_struktur_bidang_id: kurikulum_dan_struktur_bidang_id},
			success:function(data){
				kurikulum_dan_struktur_bidang = data.split("|");
				$("#d_kurikulum_dan_struktur_bidang_id").text(kurikulum_dan_struktur_bidang_id);
				$("#d_kurikulum").text(kurikulum_dan_struktur_bidang[0]);
				$("#d_description").text(kurikulum_dan_struktur_bidang[1]);
				$("#d_created_at").text(kurikulum_dan_struktur_bidang[2]);
				$("#box-table-kurikulum_dan_struktur_bidang").hide();
				$("#box-detail-kurikulum_dan_struktur_bidang").fadeIn("slow");
			}
		});
	});

	$(".text-edit-kurikulum_dan_struktur_bidang").click(function(){
		$("#form_action").val("update");
		var kurikulum_dan_struktur_bidang_id = $(this).attr("data-kurikulum-dan-struktur-bidang-id");
		$("#kurikulum_dan_struktur_bidang_id").val(kurikulum_dan_struktur_bidang_id);

		$.ajax({
			method: "post",
			url: "kurikulum_dan_struktur_bidang/edit_kurikulum_dan_struktur_bidang",
			data: {kurikulum_dan_struktur_bidang_id: kurikulum_dan_struktur_bidang_id},
			success:function(data){
				var s = data.split("|");
				$("#kurikulum_dan_struktur_bidang_id").val(kurikulum_dan_struktur_bidang_id);
				$(".redactor_editor").html(s[0]);
				$(".description").html(s[0]);
				$("#box-table-kurikulum_dan_struktur_bidang").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-kurikulum_dan_struktur_bidang").click(function(){
		var kurikulum_dan_struktur_bidang_id = $(this).attr("data-kurikulum_dan_struktur_bidang-id");
		var confirmation = confirm("Are you sure you want to delete this kurikulum_dan_struktur_bidang ?")

		if(confirmation === true){
			var second_confirmation = confirm("It will delete all photos related to this kurikulum_dan_struktur_bidang, ok ?");
			if(second_confirmation === true){
				$.ajax({
					method: "post",
					url: "kurikulum_dan_struktur_bidang/delete_kurikulum_dan_struktur_bidang",
					data: {kurikulum_dan_struktur_bidang_id: kurikulum_dan_struktur_bidang_id},
					success:function(data){
						if(data==="success"){
							alert("kurikulum_dan_struktur_bidang deleted");
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
		$("#d_kurikulum_dan_struktur_bidang_id").text("");
		$("#d_title").text("");
		$("#d_created_at").text("");
		$("#box-detail-kurikulum_dan_struktur_bidang").hide();
		$("#box-table-kurikulum_dan_struktur_bidang").fadeIn("slow");
	});
}