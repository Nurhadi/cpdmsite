$(document).ready(function(){
	var base_url = "<?php echo base_url();?>";

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

	// latitude
	$("#text-edit-latitude").click(function(){
		$("#box-display-latitude").hide();
		$("#box-edit-latitude").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-latitude").click(function(){
		$("#box-edit-latitude").hide();
		$("#box-display-latitude").fadeIn("slow");
		return false;
	});

	$("#btn-submit-latitude").click(function(){
		var latitude = $("#box-edit-latitude textarea").val();
		
		$.ajax({
			method: "post",
			url: "about_us/update_latitude",
			data: {latitude: latitude},
			success:function(data){
				if(data==="success"){
					$("#box-edit-latitude").hide();
					$("#box-display-latitude span").text(latitude);
					$("#box-display-latitude").fadeIn("slow");
				}
				else{
					alert("an error occured!");
				}
				return false;
			}
		});
	});

	// longitude
	$("#text-edit-longitude").click(function(){
		$("#box-display-longitude").hide();
		$("#box-edit-longitude").fadeIn("slow");
		return false;
	});

	$("#btn-cancel-longitude").click(function(){
		$("#box-edit-longitude").hide();
		$("#box-display-longitude").fadeIn("slow");
		return false;
	});

	$("#btn-submit-longitude").click(function(){
		var longitude = $("#box-edit-longitude textarea").val();
		
		$.ajax({
			method: "post",
			url: "about_us/update_longitude",
			data: {longitude: longitude},
			success:function(data){
				if(data==="success"){
					$("#box-edit-longitude").hide();
					$("#box-display-longitude span").text(longitude);
					$("#box-display-longitude").fadeIn("slow");
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
			data: {page_id: 4, content: content},
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
});