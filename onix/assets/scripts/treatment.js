$(document).ready(function(){
	// data table
	$('#treatment').dataTable();

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
			data: {page_id: 3, content: content},
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

	// treatment
	$("#text-add-treatment").click(function(){
		$("#form_action").val("create");
		$("#treatment_id").val("");
		$("#box-table-treatment").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$(".text-edit-treatment").click(function(){
		$("#form_action").val("update");
		var treatment_id = $(this).attr("data-treatment-id");
		$("#treatment_id").val(treatment_id);

		$.ajax({
			method: "post",
			url: "treatment/edit_treatment",
			data: {treatment_id: treatment_id},
			success:function(data){
				var s = data.split("|");
				$("#treatment_id").val(s[0]);
				$("#title").val(s[1]);

				// big image
				if(s[2] === ""){
					$("#btn-choose-image-0").removeAttr("style");
					$("#image_0_preview").attr("src", "");
					$("#image_0_preview").hide();
				}
				else{
					$("#btn-choose-image-0").css("display","block");
					$("#btn-choose-image-0").css("margin","0 auto 10px");
					$("#image_0_preview").attr("src", base_url + s[2]);
					$("#image_0_preview").css("display", "block");
					$("#image_0_preview").css("margin", "0 auto");
					$("#image_0_preview").show();
				}

				// small image 1
				if(s[3] === ""){
					$("#btn-choose-image-1").removeAttr("style");
					$("#image_1_preview").attr("src", "");
					$("#image_1_preview").hide();
				}
				else{
					$("#btn-choose-image-1").css("display","block");
					$("#btn-choose-image-1").css("margin","0 auto 10px");
					$("#image_1_preview").attr("src", base_url + s[3]);
					$("#image_1_preview").css("display", "block");
					$("#image_1_preview").css("margin", "0 auto");
					$("#image_1_preview").show();
				}

				// small image 2
				if(s[4] === ""){
					$("#btn-choose-image-2").removeAttr("style");
					$("#image_2_preview").attr("src", "");
					$("#image_2_preview").hide();
				}
				else{
					$("#btn-choose-image-2").css("display","block");
					$("#btn-choose-image-2").css("margin","0 auto 10px");
					$("#image_2_preview").attr("src", base_url + s[4]);
					$("#image_2_preview").css("display", "block");
					$("#image_2_preview").css("margin", "0 auto");
					$("#image_2_preview").show();
				}

				// small image 3
				if(s[5] === ""){
					$("#btn-choose-image-3").removeAttr("style");
					$("#image_3_preview").attr("src", "");
					$("#image_3_preview").hide();
				}
				else{
					$("#btn-choose-image-3").css("display","block");
					$("#btn-choose-image-3").css("margin","0 auto 10px");
					$("#image_3_preview").attr("src", base_url + s[5]);
					$("#image_3_preview").css("display", "block");
					$("#image_3_preview").css("margin", "0 auto");
					$("#image_3_preview").show();
				}

				// small image 4
				if(s[6] === ""){
					$("#btn-choose-image-4").removeAttr("style");
					$("#image_4_preview").attr("src", "");
					$("#image_4_preview").hide();
				}
				else{
					$("#btn-choose-image-4").css("display","block");
					$("#btn-choose-image-4").css("margin","0 auto 10px");
					$("#image_4_preview").attr("src", base_url + s[6]);
					$("#image_4_preview").css("display", "block");
					$("#image_4_preview").css("margin", "0 auto");
					$("#image_4_preview").show();
				}

				$("#status").val(s[7]);
				$("#box-table-treatment").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-treatment").click(function(){
		var treatment_id = $(this).attr("data-treatment-id");
		var confirmation = confirm("Are you sure you want to delete this treatment ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "treatment/delete_treatment",
				data: {treatment_id: treatment_id},
				success:function(data){
					if(data==="success"){
						alert("treatment deleted");
						window.location.reload();
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-submit-treatment").click(function(){
		var treatment_id = $('#treatment_id').val();
		var title = $('#hari').val();
		var big_image = $('#big_image').val();
		var status = $('#status').val();
		var form_action = $('#form_action').val();

		if(title === "" || big_image === ""){
			$(".alert").slideDown();
			setTimeout(function(){
				$(".alert").slideUp();
			}, 3000);
			return false;
		}
		else{
			return true;
		}
		// if(form_action === "create"){
		// 	$.ajax({
		// 		method: "post",
		// 		url: "treatment_praktek/create_new_treatment",
		// 		data: {profile_id: profile_id, hari: hari, status: status},
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
		// 	var treatment_id = $("#treatment_id").val();
		// 	$.ajax({
		// 		method: "post",
		// 		url: "treatment_praktek/update_treatment",
		// 		data: {treatment_id: treatment_id, profile_id: profile_id, hari: hari, status: status},
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

	$("#btn-cancel-treatment").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-treatment").fadeIn("slow");
		return false;
	});

	$(".btn-choose-image-0").click(function(){
		$("#image_0").click();
		return false;
	});

	$(".btn-choose-image-1").click(function(){
		$("#image_1").click();
		return false;
	});

	$(".btn-choose-image-2").click(function(){
		$("#image_2").click();
		return false;
	});

	$(".btn-choose-image-3").click(function(){
		$("#image_3").click();
		return false;
	});

	$(".btn-choose-image-4").click(function(){
		$("#image_4").click();
		return false;
	});
});