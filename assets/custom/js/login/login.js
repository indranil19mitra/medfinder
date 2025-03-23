function login() {
	alert("login");
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
			console.log(res);
		},
	});
}
