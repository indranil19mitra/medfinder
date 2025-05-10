$(document).ready(function () {
	$("#active_label").html("Active");
});

function addMedicineType() {
	var formData = new FormData($("#addMedicineTypeForm")[0]);
	$(".err").html("");
	$.ajax({
		type: "post",
		url: baseurl + "medicineType/add",
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
				window.location.href = baseurl + "medicineType";
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
			url: baseurl + "medicineType/updateStatus",
			data: {
				id: id,
				status: $(obj).val(),
			},
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == true) {
					alert(res.msg);
					window.location.href = baseurl + "medicineType";
				}
				if (res.status == false) {
					alert(res.msg);
				}
			},
		});
	}
}

function editMedicineType(id) {
	$.ajax({
		url: baseurl + "medicineType/edit",
		type: "post",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (res) {
			// console.log(res);
			if (res.status == true) {
				$("#addMedicineTypeModal").modal("show");
				$("#addMedicineTypeModal_title").html("Edit Shop");
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
				$("#type").val(res.data.type);
			}
		},
	});
}
