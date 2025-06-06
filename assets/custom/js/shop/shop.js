$(document).ready(function () {
	$("#active_label").html("Active");
});

function addShop() {
	var formData = new FormData($("#addShopForm")[0]);
	$(".err").html("");
	$.ajax({
		type: "post",
		url: baseurl + "shop/addShop",
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
				window.location.href = baseurl + "shop";
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
			url: baseurl + "shop/updateStatus",
			data: {
				id: id,
				status: $(obj).val(),
			},
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == true) {
					alert(res.msg);
					window.location.href = baseurl + "shop";
				}
				if (res.status == false) {
					alert(res.msg);
				}
			},
		});
	}
}

function editShop(id) {
	$.ajax({
		url: baseurl + "shop/editShop",
		type: "post",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (res) {
			// console.log(res);
			if (res.status == true) {
				$("#addShopModal").modal("show");
				$("#addShopModal_title").html("Edit Shop");
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
				$("#name").val(res.data.name);
				$("#phone").val(res.data.phone);
			}
		},
	});
}
