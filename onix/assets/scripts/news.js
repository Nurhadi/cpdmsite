$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#news').dataTable();

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

	// news
	$("#text-add-news").click(function(){
		$("#form_action").val("create");
		$("#news_id").val("");
		$("#box-table-news").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-news").click(function(){
		var title = $('#title').val();
		var keywords = $('#keywords').val();
		var description = $('#description').val();
		var form_action = $('#form_action').val();
		if(form_action === "create"){
			var content = $('.content').val();
		}
		else if(form_action === "update"){
			var content = $('.content').html();
		}

		if(title === "" || keywords === "" || description === "" || content === "" || form_action === ""){
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

	$("#btn-cancel-news").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-news").fadeIn("slow");
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
	// news
	$(".text-detail-news").click(function(){
		var news_id = $(this).attr("data-news-id");

		$.ajax({
			method: "post",
			url: "news/detail_news",
			data: {news_id: news_id},
			success:function(data){
				news = data.split("|");
				$("#d_news_id").text(news_id);
				$("#d_title").text(news[0]);
				$("#d_keywords").text(news[1]);
				$("#d_description").text(news[2]);
				if(news[3] !== ""){
					$("#d_thumbnail").attr("src", "./../uploads/news/"+news[3]);
				}
				if(news[4] !== ""){
					$("#d_small_thumbnail").attr("src", "./../uploads/news/"+news[4]);
				}
				$("#d_content").text(news[5]);
				$("#d_tanggal_dibuat").text(news[6]);
				$("#box-table-news").hide();
				$("#box-detail-news").fadeIn("slow");
			}
		});
	});

	$(".text-edit-news").click(function(){
		$("#form_action").val("update");
		var news_id = $(this).attr("data-news-id");
		$("#news_id").val(news_id);

		$.ajax({
			method: "post",
			url: "news/edit_news",
			data: {news_id: news_id},
			success:function(data){
				var s = data.split("|");
				$("#news_id").val(news_id);
				$("#title").val(s[0]);
				$("#keywords").val(s[1]);
				$("#description").val(s[2]);
				if(s[3] === ""){
					$("#btn-choose-thumbnail").removeAttr("style");
					$("#image-thumbnail").attr("src", "");
					$("#image-thumbnail").hide();
				}
				else{
					$("#btn-choose-thumbnail").css("display","block");
					$("#btn-choose-thumbnail").css("margin","0 auto 10px");
					$("#image-thumbnail").attr("src", "./../uploads/news/"+s[3]);
					$("#image-thumbnail").css("display", "block");
					$("#image-thumbnail").css("margin", "0 auto");
					$("#image-thumbnail").show();
				}
				if(s[4] === ""){
					$("#btn-choose-small-thumbnail").removeAttr("style");
					$("#image-small-thumbnail").attr("src", "");
					$("#image-small-thumbnail").hide();
				}
				else{
					$("#btn-choose-small-thumbnail").css("display","block");
					$("#btn-choose-small-thumbnail").css("margin","0 auto 10px");
					$("#image-small-thumbnail").attr("src", "./../uploads/news/"+s[4]);
					$("#image-small-thumbnail").css("display", "block");
					$("#image-small-thumbnail").css("margin", "0 auto");
					$("#image-small-thumbnail").show();
				}
				$(".redactor_editor").html(s[5]);
				$(".content").html(s[5]);
				$("#tanggal_dibuat").val(s[6]);

				$("#box-table-news").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-news").click(function(){
		var news_id = $(this).attr("data-news-id");
		var confirmation = confirm("Are you sure you want to delete this news ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "news/delete_news",
				data: {news_id: news_id},
				success:function(data){
					if(data==="success"){
						alert("news deleted");
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
		$("#d_news_id").text("");
		$("#d_title").text("");
		$("#d_keywords").text("");
		$("#d_description").text("");
		$("#d_thumbnail").attr("src", "");
		$("#d_small_thumbnail").attr("src", "");
		$("#d_content").text("");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-news").hide();
		$("#box-table-news").fadeIn("slow");
	});
}