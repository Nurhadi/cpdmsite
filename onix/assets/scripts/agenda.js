$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#agenda').dataTable();

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

	// agenda
	$("#text-add-agenda").click(function(){
		$("#form_action").val("create");
		$("#agenda_id").val("");
		$("#box-table-agenda").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-agenda").click(function(){
		var title = $('#title').val();
		var link = $('#link').val();
		var form_action = $('#form_action').val();

		if(title === "" || description === "" || form_action === ""){
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

	$("#btn-cancel-agenda").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-agenda").fadeIn("slow");
		return false;
	});

	$("#btn-choose-photo").click(function(){
		$("#photo_path").click();
		return false;
	});

	$("#btn-choose-small-photo").click(function(){
		$("#small_photo_path").click();
		return false;
	});
});

function actions(){
	// agenda
	$(".text-detail-agenda").click(function(){
		var agenda_id = $(this).attr("data-agenda-id");

		$.ajax({
			method: "post",
			url: "agenda/detail_agenda",
			data: {agenda_id: agenda_id},
			success:function(data){
				agenda = data.split("|");
				$("#d_agenda_id").text(agenda_id);
				$("#d_title").text(agenda[0]);
				$("#d_link").text(agenda[1]);
				if(agenda[2] !== ""){
					$("#d_photo").attr("src", "./../uploads/agenda/"+agenda[2]);
				}
				$("#d_tanggal_dibuat").text(agenda[3]);
				$("#box-table-agenda").hide();
				$("#box-detail-agenda").fadeIn("slow");
			}
		});
	});

	$(".text-edit-agenda").click(function(){
		$("#form_action").val("update");
		var agenda_id = $(this).attr("data-agenda-id");
		$("#agenda_id").val(agenda_id);

		$.ajax({
			method: "post",
			url: "agenda/edit_agenda",
			data: {agenda_id: agenda_id},
			success:function(data){
				var s = data.split("|");
				$("#agenda_id").val(agenda_id);
				$("#title").val(s[0]);
				$("#link").val(s[1]);
				if(s[2] === ""){
					$("#btn-choose-photo").removeAttr("style");
					$("#image-photo").attr("src", "");
					$("#image-photo").hide();
				}
				else{
					$("#btn-choose-photo").css("display","block");
					$("#btn-choose-photo").css("margin","0 auto 10px");
					$("#image-photo").attr("src", "./../uploads/agenda/"+s[2]);
					$("#image-photo").css("display", "block");
					$("#image-photo").css("margin", "0 auto");
					$("#image-photo").show();
				}

				$("#box-table-agenda").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-agenda").click(function(){
		var agenda_id = $(this).attr("data-agenda-id");
		var confirmation = confirm("Are you sure you want to delete this agenda ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "agenda/delete_agenda",
				data: {agenda_id: agenda_id},
				success:function(data){
					if(data==="success"){
						alert("agenda deleted");
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
		$("#d_agenda_id").text("");
		$("#d_gallery_id").text("");
		$("#d_title").text("");
		$("#d_link").text("");
		$("#d_photo").attr("src", "");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-agenda").hide();
		$("#box-table-agenda").fadeIn("slow");
	});
}