function login() {
	// alert("login");
	const formData = new FormData($("#loginForm")[0]);
	$.ajax({
		type: "post",
		url: baseurl + "auth/authLogin",
	});
}
