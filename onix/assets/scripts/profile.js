$(document).ready(function(){
	// data table
	$('#profile').dataTable();

	// redactor
	$('#redactor').redactor({
		focus: true,
		minHeight: 125
	});
	$('#redactor-form').redactor({
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

	// content
	$("#text-edit-content").click(function(){
		$("#box-display-content").hide();
		$("#box-edit-content").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-content").click(function(){
		$("#box-edit-content").hide();
		$("#box-display-content").fadeIn("slow");
		return false;
	});;

	$("#btn-submit-content").click(function(){
		var content = $("#box-edit-content textarea").val();

		$.ajax({
			method: "post",
			url: "page/update_page_content",
			data: {page_id: 2, content: content},
			success:function(data){
				if(data==="success"){
					$("#box-edit-content").hide();
					$("#box-display-content span").html(content);
					$("#box-display-content").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// profile
	$("#text-add-profile").click(function(){
		$("#form_action").val("create");
		$("#profile_id").val("");
		$("#box-table-profile").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$(".text-edit-profile").click(function(){
		$("#form_action").val("update");
		var profile_id = $(this).attr("data-profile-id");
		$("#profile_id").val(profile_id);

		$.ajax({
			method: "post",
			url: "profile/edit_profile",
			data: {profile_id: profile_id},
			success:function(data){
				var s = data.split("|");
				$("#fullname").val(s[0]);
				$("#position").val(s[1]);
				$(".redactor_editor").html(s[2]);
				$(".description").html(s[2]);
				if(s[3] === ""){
					$("#btn-choose-image").removeAttr("style");
					$("#image-photo").attr("src", "");
					$("#image-photo").hide();
				}
				else{
					$("#btn-choose-image").css("display","block");
					$("#btn-choose-image").css("margin","0 auto 10px");
					$("#image-photo").attr("src", website_url + s[3]);
					$("#image-photo").css("display", "block");
					$("#image-photo").css("margin", "0 auto");
					$("#image-photo").show();
				}
				$("#status").val(s[4]);
				$("#box-table-profile").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-profile").click(function(){
		var profile_id = $(this).attr("data-profile-id");
		var confirmation = confirm("Are you sure you want to delete this profile ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "profile/delete_profile",
				data: {profile_id: profile_id},
				success:function(data){
					if(data==="success"){
						alert("profile deleted");
						window.location.reload();
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-submit-profile").click(function(){
		var fullname = $('#fullname').val();
		var position = $('#position').val();
		var photo = $('#photo').val();
		var status = $('#status').val();
		var form_action = $('#form_action').val();

		if(fullname === "" || position === ""){
			$(".alert").slideDown();
			setTimeout(function(){
				$(".alert").slideUp();
			}, 3000);
			return false;
		}
		else{
			return true;
		}

		// ajax
		// if(form_action === "create"){
		// 	var description = $('.description').val();
		// 	$.ajax({
		// 		method: "post",
		// 		url: "profile/create_new_profile",
		// 		data: {fullname: fullname, position: position, description: description, photo: photo, status: status},
		// 		success:function(data){
		// 			if(data==="success"){
		// 				alert("success");
		// 			}
		// 			else{
		// 				alert("an error occured!");
		// 			}
		// 		}
		// 	});
		// }
		// else{
		// 	var profile_id = $("#profile_id").val();
		// 	var description = $('.redactor_editor').html();
		// 	$.ajax({
		// 		method: "post",
		// 		url: "profile/update_profile",
		// 		data: {profile_id: profile_id, fullname: fullname, position: position, description: description, photo: photo, status: status},
		// 		success:function(data){
		// 			if(data==="success"){
		// 				alert("success");
		// 			}
		// 			else{
		// 				alert("an error occured!");
		// 			}
		// 		}
		// 	});
		// }
	});

	$("#btn-cancel-profile").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-profile").fadeIn("slow");
		return false;
	});

	$(".btn-choose-photo").click(function(){
		$("#photo_path").click();
		return false;
	});
});