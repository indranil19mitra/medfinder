$(document).ready(function () {
	$("#active_label").html("Active");
});

function addMedicineCompany() {
	var formData = new FormData($("#addMedicineCompanyForm")[0]);
	$(".err").html("");
	$.ajax({
		type: "post",
		url: baseurl + "medicineCompany/add",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		catch: false,
		success: function (res) {
			console.log(res);
			if (res.status == false) {
				$.each(res.field, function (key, value) {
					// console.log(key, value);
					$("[name=" + key + "]").after(
						"<span class='err text-danger'>" + value + "</span>"
					);
				});
			}
			if (res.status == true) {
				// alert(res.msg);
				window.location.href = baseurl + "medicineCompany";
			}
		},
	});
}

function isActive(obj, id = "") {
	if ($(obj).is(":checked")) {
		$(obj).val(1);
		$("#active_label").html("Active");
	} else {
		$(obj).val(0);
		$("#active_label").html("Inactive");
	}
	if (id != "") {
		$.ajax({
			type: "post",
			url: baseurl + "medicineCompany/updateStatus",
			data: {
				id: id,
				status: $(obj).val(),
			},
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == true) {
					alert(res.msg);
					window.location.href = baseurl + "medicineCompany";
				}
				if (res.status == false) {
					alert(res.msg);
				}
			},
		});
	}
}

function editmedicineCompany(id) {
	$.ajax({
		url: baseurl + "medicineCompany/edit",
		type: "post",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (res) {
			// console.log(res);
			if (res.status == true) {
				$("#addMedicineCompanyModal").modal("show");
				$("#addMedicineCompanyModal_title").html("Edit Shop");
				if (res.data.status == 1) {
					$("#active_button").prop("checked", true);
					$("#active_button").val(1);
					$("#active_label").html("Active");
				} else {
					$("#active_button").prop("checked", false);
					$("#active_button").val(0);
					$("#active_label").html("Inactive");
				}
				$("#e_id").val(res.data.id);
				$("#company_name").val(res.data.company_name);
			}
		},
	});
}
