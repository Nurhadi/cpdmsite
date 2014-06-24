$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#kesan_pesan').dataTable();

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
			data: {page_id: 26, title: title},
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
			data: {page_id: 26, keywords: keywords},
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
			data: {page_id: 26, description: description},
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
});

function actions(){
	// kesan_pesan
	$(".text-detail-kesan_pesan").click(function(){
		var kesan_pesan_id = $(this).attr("data-kesan_pesan-id");

		$.ajax({
			method: "post",
			url: "kesan_pesan/detail_kesan_pesan",
			data: {kesan_pesan_id: kesan_pesan_id},
			success:function(data){
				kesan_pesan = data.split("|");
				$("#d_kesan_pesan_id").text(kesan_pesan_id);
				$("#d_nama_lengkap").text(kesan_pesan[0]);
				$("#d_jabatan").text(kesan_pesan[1]);
				$("#d_kota").text(kesan_pesan[2]);
				if(kesan_pesan[3] !== ""){
					$("#d_thumbnail").attr("src", "./../uploads/kesan_pesan/"+kesan_pesan[3]);
				}
				$("#d_kesan_pesan").text(kesan_pesan[4]);
				$("#d_tanggal_dibuat").text(kesan_pesan[5]);
				$("#d_status").text(kesan_pesan[6]);
				$("#d_tanggal_disetujui").text(kesan_pesan[7]);
				if(kesan_pesan[6] === "approved"){
					$(".text-approve-kesan_pesan-detail").hide();
				}
				else{
					$(".text-approve-kesan_pesan-detail").show();
				}
				$(".text-approve-kesan_pesan-detail").attr("data-kesan_pesan-id", kesan_pesan_id);
				$("#box-table-kesan_pesan").hide();
				$("#box-detail-kesan_pesan").fadeIn("slow");
			}
		});
	});

	$(".text-approve-kesan_pesan, .text-approve-kesan_pesan-detail").click(function(){
		var kesan_pesan_id = $(this).attr("data-kesan_pesan-id");
		var confirmation = confirm("Are you sure you want to approve this kesan_pesan ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "kesan_pesan/approve_kesan_pesan",
				data: {kesan_pesan_id: kesan_pesan_id},
				success:function(data){
					if(data==="success"){
						alert("kesan_pesan approved");
						window.location.reload();
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$(".text-delete-kesan_pesan").click(function(){
		var kesan_pesan_id = $(this).attr("data-kesan_pesan-id");
		var confirmation = confirm("Are you sure you want to delete this kesan_pesan ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "kesan_pesan/delete_kesan_pesan",
				data: {kesan_pesan_id: kesan_pesan_id},
				success:function(data){
					if(data==="success"){
						alert("kesan_pesan deleted");
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
		$("#kesan_pesan_id").val("");
		$("#kategori").val("");
		$("#nama_lengkap").val("");
		$("#nidn_nip").val("");
		$("#tempat").val("");
		$("#tanggal_lahir").val("");
		$("#alamat").val("");
		$("#instansi").val("");
		$("#alamat_instansi").val("");
		$("#no_telepon").val("");
		$("#no_handphone").val("");
		$("#email").val("");
		$("#surat_tugas").attr("href", "");
		$("#informasi_laboratorium_sekolah").attr("href", "");
		$("#periode_pelatihan").val("");
		$("#foto").attr("src", "");
		$("#status").val("");
		$("#tanggal_dibuat").val("");
		$("#bukti_pembayaran").attr("src", "");
		$("#tanggal_konfirmasi").val("");
		$("#tanggal_disetujui").val("");
		$("#box-detail-kesan_pesan").hide();
		$(".text-approve-kesan_pesan-detail").hide();
		$("#box-table-kesan_pesan").fadeIn("slow");
	});
}