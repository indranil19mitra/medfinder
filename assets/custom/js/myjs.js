$(document).ready(function () {
	$("#state_details_sbmt").hide();
	// $(".slct_cls").select2();
	$("#submitForm").click(function () {
		var formData = new FormData($("#login_form")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "auth/auth_login",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// console.log(res);
				if (res.status != "101") {
					$("#err_msg").html(res.msg);
				} else {
					$("#err_msg").html("");
					window.location.href = baseurl;
				}
			},
		});
	});
});
