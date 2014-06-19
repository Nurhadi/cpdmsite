$(document).ready(function(){
	// include all actions functions
	actions();

	// data table
	$('#peserta').dataTable();

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
			data: {page_id: 1, title: title},
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
			data: {page_id: 1, keywords: keywords},
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
			data: {page_id: 1, description: description},
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
	// peserta
	$(".text-detail-peserta").click(function(){
		var peserta_id = $(this).attr("data-peserta-id");

		$.ajax({
			method: "post",
			url: "peserta/detail_peserta",
			data: {peserta_id: peserta_id},
			success:function(data){
				peserta = data.split("|");
				$("#peserta_id").text(peserta_id);
				$("#kategori").text("Kepala Laboratorium "+peserta[0]);
				$("#nama_lengkap").text(peserta[1]);
				$("#nidn_nip").text(peserta[2]);
				$("#tempat").text(peserta[3]);
				$("#tanggal_lahir").text(peserta[4]);
				$("#alamat").text(peserta[5]);
				$("#instansi").text(peserta[6]);
				$("#alamat_instansi").text(peserta[7]);
				$("#no_telepon").text(peserta[8]);
				$("#no_handphone").text(peserta[9]);
				$("#email").text(peserta[10]);
				if(peserta[11] !== ""){
					$("#surat_tugas").attr("href", "./../uploads/pendaftaran/"+peserta[11]);
				}
				if(peserta[12] !== ""){
					$("#informasi_laboratorium_sekolah").attr("href", "../uploads/pendaftaran/"+peserta[12]);
				}
				$("#periode_pelatihan").text(peserta[13]);
				if(peserta[14] !== ""){
					$("#foto").attr("src", "./../uploads/pendaftaran/"+peserta[14]);
				}
				$("#status").text(peserta[15]);
				$("#tanggal_dibuat").text(peserta[16]);
				if(peserta[17] !== ""){
					$("#bukti_pembayaran").attr("src", "./../uploads/bukti_pembayaran/"+peserta[17]);
				}
				$("#tanggal_konfirmasi").text(peserta[18]);
				$("#tanggal_disetujui").text(peserta[19]);
				if(peserta[15] === "approved" || peserta[15] === "pending"){
					$(".text-approve-peserta-detail").hide();
				}
				else{
					$(".text-approve-peserta-detail").show();
				}
				$(".text-approve-peserta-detail").attr("data-peserta-id", peserta_id);
				$("#box-table-peserta").hide();
				$("#box-detail-peserta").fadeIn("slow");
			}
		});
	});

	$(".text-approve-peserta, .text-approve-peserta-detail").click(function(){
		var peserta_id = $(this).attr("data-peserta-id");
		var confirmation = confirm("Are you sure you want to approve this peserta ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "peserta/approve_peserta",
				data: {peserta_id: peserta_id},
				success:function(data){
					if(data==="success"){
						alert("peserta approved");
						window.location.reload();
					}
					else{
						alert("an error occured!");
					}
				}
			});
		}
	});

	$(".text-delete-peserta").click(function(){
		var peserta_id = $(this).attr("data-peserta-id");
		var confirmation = confirm("Are you sure you want to delete this peserta ?")

		if(confirmation === true){
			$.ajax({
				method: "post",
				url: "peserta/delete_peserta",
				data: {peserta_id: peserta_id},
				success:function(data){
					if(data==="success"){
						alert("peserta deleted");
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
		$("#peserta_id").val("");
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
		$("#box-detail-peserta").hide();
		$(".text-approve-peserta-detail").hide();
		$("#box-table-peserta").fadeIn("slow");
	});
}