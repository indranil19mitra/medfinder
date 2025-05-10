function deleteFn(id = "", table = "", redirect = "", path = "") {
	if (confirm("Are you sure you want to delete this?")) {
		console.log(id);
		$.ajax({
			type: "post",
			url: baseurl + path,
			data: {
				id: id,
				table: table,
			},
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == true) {
					alert(res.msg);
					window.location.href = baseurl + redirect;
				}
				if (res.status == false) {
					alert(res.msg);
				}
			},
		});
	}
}
