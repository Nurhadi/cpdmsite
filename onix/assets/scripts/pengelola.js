$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#pengelola').dataTable();

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
			data: {page_id: 5, title: title},
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
			data: {page_id: 5, keywords: keywords},
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
			data: {page_id: 5, description: description},
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

	// pengelola
	$("#text-add-pengelola").click(function(){
		$("#form_action").val("create");
		$("#pengelola_id").val("");
		$("#box-table-pengelola").hide();
		$("#box-form-slider").fadeIn("slow");
		return false;
	});

	$("#btn-submit-pengelola").click(function(){
		var nama = $('#nama').val();
		var alamat = $('#alamat').val();
		var telepon = $('#telepon').val();
		var email = $('#email').val();
		var jabatan = $('#jabatan').val();
		var form_action = $('#form_action').val();
		if(form_action === "create"){
			var content = $('.content').val();
		}
		else if(form_action === "update"){
			var content = $('.content').html();
		}

		if(nama === "" || alamat === "" || telepon === "" || email === "" || jabatan === "" || form_action === ""){
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

	$("#btn-cancel-pengelola").click(function(){
		$("#box-form-slider").hide();
		$("#box-table-pengelola").fadeIn("slow");
		return false;
	});

	$("#btn-choose-photo").click(function(){
		$("#photo_path").click();
		return false;
	});
});

function actions(){
	// pengelola
	$(".text-detail-pengelola").click(function(){
		var pengelola_id = $(this).attr("data-pengelola-id");

		$.ajax({
			method: "post",
			url: "pengelola/detail_pengelola",
			data: {pengelola_id: pengelola_id},
			success:function(data){
				pengelola = data.split("|");
				$("#d_pengelola_id").text(pengelola_id);
				$("#d_nama").text(pengelola[0]);
				$("#d_alamat").text(pengelola[1]);
				$("#d_email").text(pengelola[2]);
				$("#d_telepon").text(pengelola[3]);
				$("#d_jabatan").text(pengelola[4]);
				if(pengelola[5] !== ""){
					$("#d_photo").attr("src", "./../uploads/pengelola/"+pengelola[5]);
				}
				$("#d_pengelola_bagian").text(pengelola[6]);
				$("#d_tanggal_dibuat").text(pengelola[7]);
				$("#box-table-pengelola").hide();
				$("#box-detail-pengelola").fadeIn("slow");
			}
		});
	});

	$(".text-edit-pengelola").click(function(){
		$("#form_action").val("update");
		var pengelola_id = $(this).attr("data-pengelola-id");
		$("#pengelola_id").val(pengelola_id);

		$.ajax({
			method: "post",
			url: "pengelola/edit_pengelola",
			data: {pengelola_id: pengelola_id},
			success:function(data){
				var s = data.split("|");
				$("#pengelola_id").val(pengelola_id);
				$("#nama").val(s[0]);
				$("#alamat").val(s[1]);
				$("#email").val(s[2]);
				$("#telepon").val(s[3]);
				$("#jabatan").val(s[4]);
				if(s[5] === ""){
					$("#btn-choose-photo").removeAttr("style");
					$("#image-photo").attr("src", "");
					$("#image-photo").hide();
				}
				else{
					$("#btn-choose-photo").css("display","block");
					$("#btn-choose-photo").css("margin","0 auto 10px");
					$("#image-photo").attr("src", "./../uploads/pengelola/"+s[5]);
					$("#image-photo").css("display", "block");
					$("#image-photo").css("margin", "0 auto");
					$("#image-photo").show();
				}

				$("#pengelola_bagian").val(s[6]);

				$("#box-table-pengelola").hide();
				$("#box-form-slider").fadeIn("slow");
			}
		});
	});

	$(".text-delete-pengelola").click(function(){
		var pengelola_id = $(this).attr("data-pengelola-id");
		var confirmation = confirm("Are you sure you want to delete this pengelola ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "pengelola/delete_pengelola",
				data: {pengelola_id: pengelola_id},
				success:function(data){
					if(data==="success"){
						alert("pengelola deleted");
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
		$("#d_pengelola_id").text("");
		$("#d_title").text("");
		$("#d_keywords").text("");
		$("#d_description").text("");
		$("#d_thumbnail").attr("src", "");
		$("#d_small_thumbnail").attr("src", "");
		$("#d_content").text("");
		$("#d_tanggal_dibuat").text("");
		$("#box-detail-pengelola").hide();
		$("#box-table-pengelola").fadeIn("slow");
	});
}