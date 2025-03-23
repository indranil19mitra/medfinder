function login() {
	// alert("login");
	const formData = new FormData($("#loginForm")[0]);
	$.ajax({
		type: "post",
		url: baseurl + "auth/authLogin",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		catch: false,
		success: function (res) {
			// console.log(res);
			if (res.status != 101) {
				// $("#err_msg").html(res.msg);
				console.log(res.msg);
			} else {
				window.location.href = baseurl + "dashboard";
			}
		},
	});
}
