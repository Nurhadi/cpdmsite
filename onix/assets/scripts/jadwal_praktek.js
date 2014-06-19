$(document).ready(function(){
	var base_url = "<?php echo base_url();?>";

	// data table 
	$('#jadwal').dataTable();

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
					$("#box-display-keywords span").text(description);
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

	// jadwal
	$("#text-add-jadwal").click(function(){
		$("#form_action").val("create");
		$("#jadwal_id").val("");
		$("#box-table-jadwal").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$(".text-edit-jadwal").click(function(){
		$("#form_action").val("update");
		var jadwal_id = $(this).attr("data-jadwal-id");
		$("#jadwal_id").val(jadwal_id);

		$.ajax({
			method: "post",
			url: "jadwal_praktek/edit_jadwal",
			data: {jadwal_id: jadwal_id},
			success:function(data){
				var s = data.split("|");
				$("#profile_id").val(s[0]);
				$("#hari").val(s[1]);
				$("#status").val(s[2]);
				$("#box-table-jadwal").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});	
	});

	$(".text-delete-jadwal").click(function(){
		var jadwal_id = $(this).attr("data-jadwal-id");
		var confirmation = confirm("Are you sure you want to delete this jadwal ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "jadwal_praktek/delete_jadwal",
				data: {jadwal_id: jadwal_id},
				success:function(data){
					if(data==="success"){
						alert("jadwal deleted");
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$("#btn-submit-jadwal").click(function(){
		var profile_id = $('#profile_id').val();
		var hari = $('#hari').val();
		var status = $('#status').val();
		var form_action = $('#form_action').val();

		if(form_action === "create"){
			$.ajax({
				method: "post",
				url: "jadwal_praktek/create_new_jadwal",
				data: {profile_id: profile_id, hari: hari, status: status},
				success:function(data){
					if(data==="success"){
						alert("success");
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
		else{
			var jadwal_id = $("#jadwal_id").val();
			$.ajax({
				method: "post",
				url: "jadwal_praktek/update_jadwal",
				data: {jadwal_id: jadwal_id, profile_id: profile_id, hari: hari, status: status},
				success:function(data){
					if(data==="success"){
						alert("success");
					}
					else{
						alert("an error occured!");
					}
				}
			});	
		}
	});

	$("#btn-cancel-jadwal").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-jadwal").fadeIn("slow");
		return false;
	});
});