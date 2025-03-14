$(document).ready(function () {
	$("#state_details_sbmt").hide();
	// $(".slct_cls").select2();
	$("#submitForm").click(function () {
		var formData = new FormData($("#login_form")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "auth_login",
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

	$("#state_details_sbmt").click(function () {
		var formData = new FormData($("#state_details")[0]);
		$.ajax({
			type: "POST",
			url: baseurl + "state_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// console.log(res);
				if (res.status != 103) {
					window.location.href = baseurl + "state";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#place_details_sbmt").click(function () {
		var formData = new FormData($("#place_details")[0]);
		$.ajax({
			type: "POST",
			url: baseurl + "place_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// console.log(res);
				if (res.status != 103) {
					window.location.href = baseurl + "place";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_category_details_sbmt").click(function () {
		var formData = new FormData($("#tour_category_details")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "tour_category_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "tour_category";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_details_sbmt").click(function () {
		var formData = new FormData($("#tour_details")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "tour_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "tours";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#destination_details_sbmt").click(function () {
		var formData = new FormData($("#destination_details")[0]);

		$.ajax({
			type: "POST",
			url: baseurl + "destination_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "tour_destination";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_about_details_sbmt").click(function () {
		// Trigger TinyMCE to update the original textarea
		// tinymce.triggerSave();
		tinymce.triggerSave("tour_about_details");

		// Create a FormData object from the form with the id "tour_about_details"
		var formData = new FormData($("#tour_about_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_about_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_about";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_itinerary_details_sbmt").click(function () {
		tinymce.triggerSave("tour_itinerary_details");
		var formData = new FormData($("#tour_itinerary_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_itinerary_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_itinerary";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_inclusions_exclusions_details_sbmt").click(function () {
		tinymce.triggerSave("tour_inclusions_exclusions_details");
		var formData = new FormData($("#tour_inclusions_exclusions_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_inclusions_exclusions_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_inclusions_exclusions";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_other_info_details_sbmt").click(function () {
		tinymce.triggerSave("tour_other_info_details");
		var formData = new FormData($("#tour_other_info_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_other_info_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_other_info";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#tour_photos_sbmt").click(function () {
		var formData = new FormData($("#tour_photos_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_photos_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_photos";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#travel_mates_images_sbmt").click(function () {
		var formData = new FormData($("#travel_mates_images_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "travel_mate_images_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "travel_mate_images";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#category_photos_sbmt").click(function () {
		var formData = new FormData($("#category_photos_details")[0]);

		// Perform an AJAX request
		$.ajax({
			type: "POST",
			url: baseurl + "tour_category_photos_details",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				// Handle the server response
				if (res.status != 103) {
					window.location.href = baseurl + "tour_category_photos";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});

	$("#Country_details_sbmt").click(function () {
		var formData = new FormData($("#Country_details")[0]);

		$.ajax({
			url: baseurl + "country_code_details",
			type: "post",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status != 103) {
					window.location.href = baseurl + "country_code";
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	});
});

$("#terms_conditions_details_sbmt").click(function () {
	// Trigger TinyMCE to update the original textarea
	// tinymce.triggerSave();
	tinymce.triggerSave("terms_conditions_details");

	// Create a FormData object from the form with the id "terms_conditions_details"
	var formData = new FormData($("#terms_conditions_details")[0]);

	// Perform an AJAX request
	$.ajax({
		type: "POST",
		url: baseurl + "terms_conditions_details",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		success: function (res) {
			// Handle the server response
			if (res.status != 103) {
				window.location.href = baseurl + "terms_conditions";
				successToster(res.msg);
			} else {
				errorToster(res.msg);
			}
		},
	});
});

function stateFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_state_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#state").val(res.data.name);
						$("#status").val(res.data.status).trigger("change");
						$("#state_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "state";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function placeFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_place_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#place").val(res.data.name);
						$("#state").val(res.data.state).trigger("change");
						$("#status").val(res.data.status).trigger("change");
						$("#place_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "place";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_categoryFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl + (types == "edit" ? "edit_tour_category_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#category_name").val(res.data.name);
						$("#status").val(res.data.status).trigger("change");
						$("#place_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_category";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_tour_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tour_name").val(res.data.name);
						$("#tour_short_desc").html(res.data.short_desc);
						$("#tour_header_desc").html(res.data.header_desc);
						$("#place").val(res.data.place_id).trigger("change");
						$("#tour_category")
							.val(res.data.tour_category_id)
							.trigger("change");
						$("#difficulty").val(res.data.difficulty);
						if (res.data.seat_availability != 0) {
							$("#seat_availability").val(res.data.seat_availability);
						}
						$("#status").val(res.data.status).trigger("change");

						displayExistingImage(baseurl_data + res.data.main_image);

						$("#tour_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tours";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_category_photo_Functionalities(
	ids = "",
	types = "",
	tables = ""
) {
	if (types == "edit" || types == "delete") {
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit" ? "edit_tour_category_photos_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#category_id").val(res.data.tour_category_id);
						$("#status").val(res.data.status).trigger("change");
						$("#preview_category_photos").html(
							'<img src="' +
								baseurl_data +
								res.data.trip_image +
								'" height="200px" width="auto">'
						);

						$("#tour_photos_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_category_photos";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_photosFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		$.ajax({
			type: "post",
			url:
				baseurl + (types == "edit" ? "edit_tour_photos_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						$("#status").val(res.data.status).trigger("change");

						// Check if main_image property exists in the response
						if (res.data.tour_photo) {
							$("#preview_tour_photos").html(
								'<img src="' +
									baseurl_data +
									res.data.tour_photo +
									'" height="200px" width="auto">'
							);
						}

						$("#tour_photos_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_photos";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function travel_matesFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit" ? "edit_travel_mates_image_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#status").val(res.data.status).trigger("change");

						// Check if main_image property exists in the response
						if (res.data.travel_mate_images) {
							$("#preview_tarvel_mate_image").html(
								'<img src="' +
									baseurl_data +
									res.data.travel_mate_images +
									'" height="200px" width="auto">'
							);
						}

						$("#travel_mates_images_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "travel_mate_images";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourDestFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_tour_dest_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						$("#created_at").val(res.data.created_at);
						$("#disc_percent").val(
							res.data.is_discount != "" && res.data.is_discount == "1"
								? res.data.disc_percent
								: 0
						);
						$("#drop_location").val(res.data.drop_location);
						$("#pikup_location").val(res.data.pikup_location);
						$("#duration").val(res.data.duration);
						$("#duration").prop("readonly", true);
						$("#price").val(res.data.price);
						$("#start_date").val(res.data.start_date);
						$("#end_date").val(res.data.end_date);
						$("#pax_size").val(res.data.pax_size);

						if (res.data.is_discount != "" && res.data.is_discount == "1") {
							$("#is_discount").prop("checked", true);
							$("#is_discount").attr("value", "1");
							$(".disc_percent_chk").show();
						} else {
							$("#is_discount").removeAttr("checked");
							$("#is_discount").attr("value", "0");
							$(".disc_percent_chk").hide();
						}
						$("#status").val(res.data.status).trigger("change");

						$("#destination_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tours";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_aboutFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + (types == "edit" ? "edit_tour_about_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						tinymce
							.get("tour_about_details_text")
							.setContent(res.data.tour_about_details);
						$("#status").val(res.data.status).trigger("change");

						$("#destination_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_about";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_itineraryFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit" ? "edit_tour_itinerary_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						$("#sequence").val(res.data.sequence);
						$("#status").val(res.data.status).trigger("change");
						$("#itinerary_0").val(res.data.itinerary);

						tinymce
							.get("itinerary_descriptions")
							.setContent(res.data.itinerary_sub);
						// $("#itinerary_descriptions_0").val(res.data.itinerary_sub);
						$("#add_itinerary").hide();
						$("#destination_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_itinerary";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_inclusions_exclusionsFunctionalities(
	ids = "",
	types = "",
	tables = ""
) {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit"
					? "edit_tour_inclusions_exclusions_data"
					: "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						tinymce
							.get("tour_inclusions_details_text")
							.setContent(res.data.inclusions);
						tinymce
							.get("tour_exclusions_details_text")
							.setContent(res.data.exclusions);
						$("#status").val(res.data.status).trigger("change");

						$("#tour_inclusions_exclusions_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_inclusions_exclusions";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tour_other_infoFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit" ? "edit_tour_other_info_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#tours_id").val(res.data.tours_id).trigger("change");
						tinymce
							.get("tour_other_info_details_text")
							.setContent(res.data.other_info);
						$("#status").val(res.data.status).trigger("change");

						$("#tour_other_info_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "tour_other_info";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function CountryFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl + (types == "edit" ? "edit_country_code_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						$("#name").val(res.data.name);
						$("#code").val(res.data.code);
						$("#status").val(res.data.status).trigger("change");
						$("#place_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "country_code";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function terms_conditionsFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url:
				baseurl +
				(types == "edit" ? "terms_conditions_about_data" : "delete_data"),
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					if (types != "delete") {
						$("#eid").val(res.data.id);
						tinymce
							.get("terms_conditions_details_text")
							.setContent(res.data.terms_conditions_data);
						$("#status").val(res.data.status).trigger("change");

						$("#terms_conditions_details_sbmt").show();
						successToster(res.msg);
					} else {
						window.location.href = baseurl + "terms_conditions";
						successToster(res.msg);
					}
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourBookingDetailsFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + "delete_data",
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					window.location.reload();
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourContactUsFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + "delete_data",
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					window.location.reload();
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function tourGetInTouchFunctionalities(ids = "", types = "", tables = "") {
	if (types == "edit" || types == "delete") {
		// alert(types);
		$.ajax({
			type: "post",
			url: baseurl + "delete_data",
			data: { eid: ids, tables: tables },
			dataType: "json",
			success: function (res) {
				// console.log(res);
				if (res.status == 101) {
					window.location.reload();
					successToster(res.msg);
				} else {
					errorToster(res.msg);
				}
			},
		});
	}
}

function displayExistingImage(imageUrl) {
	$("#preview_tour_image").attr("src", imageUrl);
}

function resetFun() {
	$(".clr").val("");
	$("#status").val("").trigger("change");
}

function tourResetFun() {
	$("#place").val("").trigger("change");
	$("#tour_category").val("").trigger("change");
	$("#disc_percent").hide();
	$("#add_itinerary").show();
	resetFun();
}

function tourDetailsResetFun() {
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, "0");
	var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
	var yyyy = today.getFullYear();

	today = yyyy + "-" + mm + "-" + dd;
	// console.log(today);

	$("#end_date").attr("min", today);
	$("#start_date").attr("min", today);
	$(".disc_percent_chk").hide();
}

function isExist(val = "", table = "") {
	var eid = $("#eid").val();
	$.ajax({
		type: "post",
		url: baseurl + "checkisExist",
		data: { val: val, checked_table: table, eid: eid },
		dataType: "json",
		success: function (res) {
			// console.log(res);
			if (val != "") {
				if (res.status != 101) {
					errorToster("State Already Exist!");
					if (table == "country_code") {
						$("#Country_details_sbmt").hide();
					} else {
						$("#state_details_sbmt").hide();
					}
				} else {
					successToster("State Is Available!");
					if (table == "country_code") {
						$("#Country_details_sbmt").show();
					} else {
						$("#state_details_sbmt").show();
					}
				}
			} else {
				$("#state_details_sbmt").hide();
			}
		},
	});
}

function errorToster(text_data = "") {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener("mouseenter", Swal.stopTimer);
			toast.addEventListener("mouseleave", Swal.resumeTimer);
		},
	});

	Toast.fire({
		icon: "error",
		title: "Sorry!",
		text: text_data,
	});
}

function successToster(text_data = "") {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener("mouseenter", Swal.stopTimer);
			toast.addEventListener("mouseleave", Swal.resumeTimer);
		},
	});

	Toast.fire({
		icon: "success",
		// title: 'Sorry!',
		text: text_data,
	});
}

// document.getElementById("tour_image").addEventListener("change", function (event) {
// 		const file = event.target.files[0];

// 		if (file) {
// 			const reader = new FileReader();

// 			reader.onload = function (e) {
// 				document.getElementById("preview_tour_image").src = e.target.result;
// 				document.getElementById("preview_tour_image").style.display = "block";
// 			};

// 			reader.readAsDataURL(file);
// 		}
// 	});

document.addEventListener("DOMContentLoaded", function () {
	document
		.getElementById("tour_image")
		.addEventListener("change", function (event) {
			const file = event.target.files[0];

			if (file) {
				const reader = new FileReader();

				reader.onload = function (e) {
					document.getElementById("preview_tour_image").src = e.target.result;
					document.getElementById("preview_tour_image").style.display = "block";
				};

				reader.readAsDataURL(file);
			}
		});
});

document.addEventListener("DOMContentLoaded", function () {
	document
		.getElementById("tour_photos")
		.addEventListener("change", function (event) {
			const files = event.target.files;

			if (files && files.length > 0) {
				const previewContainer = document.getElementById("preview_tour_photos");

				// Clear previous previews
				previewContainer.innerHTML = "";

				for (let i = 0; i < files.length; i++) {
					const file = files[i];
					const reader = new FileReader();

					reader.onload = function (e) {
						const imageContainer = document.createElement("div");
						imageContainer.className = "preview-image-container";

						const closeButton = document.createElement("button");
						closeButton.className = "close-button";
						closeButton.innerHTML = "&times;"; // Use '×' for a close symbol
						closeButton.addEventListener("click", function () {
							previewContainer.removeChild(imageContainer);
						});

						const image = new Image();
						image.src = e.target.result;
						image.width = 200;
						image.height = 200;

						imageContainer.appendChild(closeButton);
						imageContainer.appendChild(image);
						previewContainer.appendChild(imageContainer);
					};

					reader.readAsDataURL(file);
				}
			}
		});
});

document.addEventListener("DOMContentLoaded", function () {
	document
		.getElementById("tarvel_mate_image")
		.addEventListener("change", function (event) {
			const files = event.target.files;

			if (files && files.length > 0) {
				const previewContainer = document.getElementById(
					"preview_tarvel_mate_image"
				);

				// Clear previous previews
				previewContainer.innerHTML = "";

				for (let i = 0; i < files.length; i++) {
					const file = files[i];
					const reader = new FileReader();

					reader.onload = function (e) {
						const imageContainer = document.createElement("div");
						imageContainer.className = "preview-image-container";

						const closeButton = document.createElement("button");
						closeButton.className = "close-button";
						closeButton.innerHTML = "&times;"; // Use '×' for a close symbol
						closeButton.addEventListener("click", function () {
							previewContainer.removeChild(imageContainer);
						});

						const image = new Image();
						image.src = e.target.result;
						image.width = 200;
						image.height = 200;

						imageContainer.appendChild(closeButton);
						imageContainer.appendChild(image);
						previewContainer.appendChild(imageContainer);
					};

					reader.readAsDataURL(file);
				}
			}
		});
});

// document.addEventListener("DOMContentLoaded", function () {
// 	document
// 		.getElementById("category_photos")
// 		.addEventListener("change", function (event) {
// 			const file = event.target.files[0]; // Get the first selected file

// 			if (file) {
// 				const previewContainer = document.getElementById(
// 					"preview_category_photos"
// 				);

// 				// Clear previous previews
// 				previewContainer.innerHTML = "";

// 				const reader = new FileReader();

// 				reader.onload = function (e) {
// 					const imageContainer = document.createElement("div");
// 					imageContainer.className = "preview-image-container";

// 					const closeButton = document.createElement("button");
// 					closeButton.className = "close-button";
// 					closeButton.innerHTML = "&times;"; // Use '×' for a close symbol
// 					closeButton.addEventListener("click", function () {
// 						previewContainer.removeChild(imageContainer);
// 						document.getElementById("category_photos").value = ""; // Clear the file input value
// 					});

// 					const image = new Image();
// 					image.src = e.target.result;
// 					image.height = 200;

// 					imageContainer.appendChild(closeButton);
// 					imageContainer.appendChild(image);
// 					previewContainer.appendChild(imageContainer);
// 				};

// 				reader.readAsDataURL(file);
// 			}
// 		});
// });

document.addEventListener("DOMContentLoaded", function () {
	// Event listener for category_photos input
	document
		.getElementById("category_photos")
		.addEventListener("change", function (event) {
			preview_Images(event, "preview_category_photos");
		});

	// Event listener for tour_photos input

	function preview_Images(event, previewContainerId) {
		const file = event.target.files[0]; // Get the first selected file

		if (file) {
			const previewContainer = document.getElementById(previewContainerId);

			// Clear previous previews
			previewContainer.innerHTML = "";

			const reader = new FileReader();

			reader.onload = function (e) {
				const imageContainer = document.createElement("div");
				imageContainer.className = "preview-image-container";

				const closeButton = document.createElement("button");
				closeButton.className = "close-button";
				closeButton.innerHTML = "&times;"; // Use '×' for a close symbol
				closeButton.addEventListener("click", function () {
					previewContainer.removeChild(imageContainer);
					document.getElementById(previewContainerId).value = ""; // Clear the file input value
				});

				const image = new Image();
				image.src = e.target.result;
				image.height = 200;

				imageContainer.appendChild(closeButton);
				imageContainer.appendChild(image);
				previewContainer.appendChild(imageContainer);
			};

			reader.readAsDataURL(file);
		}
	}
});

function getCheck(obj) {
	var id = $(obj).attr("id");
	if ($("#" + id).is(":checked")) {
		$("#" + id).attr("value", "1");
		$(".disc_percent_chk").show();
	} else {
		$("#" + id).attr("value", "0");
		$(".disc_percent_chk").hide();
	}
	$("#disc_percent").val("");
}

function set_date(date = "", type = "") {
	if (type == "start_date") {
		if ($("#end_date").val() < date) {
			$("#end_date").val("");
		}
		$("#end_date").attr("min", date);
	}
	if (type == "end_date") {
		if ($("#start_date").val() > date) {
			$("#start_date").val("");
		}
		$("#start_date").attr("max", date);
	}

	if ($("#start_date").val() != "" && $("#end_date").val() != "") {
		var ttl_days = getNumberOfDays(
			$("#start_date").val(),
			$("#end_date").val()
		);
		$("#duration").val(ttl_days - 1 + "N/" + ttl_days + "D");
		$("#duration").prop("readonly", true);
	}
}

function getNumberOfDays(start, end) {
	const date1 = new Date(start);
	const date2 = new Date(end);

	// One day in milliseconds
	const oneDay = 1000 * 60 * 60 * 24;

	// Calculating the time difference between two dates
	const diffInTime = date2.getTime() - date1.getTime();

	// Calculating the no. of days between two dates
	const diffInDays = Math.round(diffInTime / oneDay);

	return diffInDays + 1;
}

tinymce.init({
	selector: "textarea#tour_about_details_text",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});

tinymce.init({
	selector: "textarea#itinerary_descriptions",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});

tinymce.init({
	selector: "textarea#tour_inclusions_details_text",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});

tinymce.init({
	selector: "textarea#tour_exclusions_details_text",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});

tinymce.init({
	selector: "textarea#tour_other_info_details_text",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});

tinymce.init({
	selector: "textarea#terms_conditions_details_text",
	width: "auto",
	height: 300,
	plugins: [
		"advlist",
		"autolink",
		"link",
		// "image",
		"lists",
		"charmap",
		"prewiew",
		"anchor",
		"pagebreak",
		"searchreplace",
		"wordcount",
		"visualblocks",
		"code",
		"fullscreen",
		"insertdatetime",
		// "media",
		"table",
		"emoticons",
		"template",
		"codesample",
	],
	toolbar:
		"undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |" +
		"bullist numlist outdent indent | print preview media fullscreen | " +
		"forecolor backcolor emoticons",
	menu: {
		favs: {
			title: "menu",
			items: "code visualaid | searchreplace | emoticons",
		},
	},
	menubar: "favs file edit view insert format tools table",
	content_style: "body{font-family:Helvetica,Arial,sans-serif; font-size:16px}",
	setup: function (editor) {
		// This event is triggered when TinyMCE is initialized
		editor.on("init", function () {
			// Hide the promotion element after initialization
			$(".tox-promotion").hide();
			$(".tox-statusbar__branding").hide();
		});
	},
});
function check_num(obj) {
	$(obj).val(
		$(obj)
			.val()
			.replace(/[^0-9]/g, "")
	);
}
function check_num_code(obj) {
	$(obj).val(
		$(obj)
			.val()
			.replace(/[^0-9+\s]/g, "")
	);
}
function check_char(obj) {
	$(obj).val(
		$(obj)
			.val()
			.replace(/[^A-Za-z]/g, "")
	);
}
function check_char_with_space(obj) {
	$(obj).val(
		$(obj)
			.val()
			.replace(/[^A-Za-z0-9+()\s]/g, "")
	);
}

function resetFun() {
	// Reset regular input fields
	$(".clr").val("");

	// Reset select dropdowns
	$(".clr_slct").val("").trigger("change");

	// Reset TinyMCE editors
	$(".clr_tinymce").each(function () {
		var editor = tinymce.get(this.id);
		if (editor) {
			editor.setContent("");
		} else {
			console.error("TinyMCE editor not found for element with ID: " + this.id);
		}
	});
}

// new DataTable("#example", {
// 	dom: "Bfrtip",
// 	buttons: ["csv", "excel", "pdf"],
// aaSorting: [[0, "desc"]],
// 	bDestroy: true,
// });

function get_currentDate() {
	var currentDate = new Date().toISOString().slice(0, 10);
	return currentDate;
}
function get_currentTime() {
	var currentTime = new Date(); // Get current date and time
	var hours = currentTime.getHours(); // Get current hours (0-23)
	var minutes = currentTime.getMinutes(); // Get current minutes (0-59)
	var seconds = currentTime.getSeconds(); // Get current seconds (0-59)

	// Formatting hours, minutes, and seconds to have leading zeros if necessary
	hours = (hours < 10 ? "0" : "") + hours;
	minutes = (minutes < 10 ? "0" : "") + minutes;
	seconds = (seconds < 10 ? "0" : "") + seconds;

	var currentTime = hours + ":" + minutes + ":" + seconds;
	console.log(currentTime);
	return currentTime;
}

var currentDateTime = get_currentDate() + " " + get_currentTime(); // Combine date and time with a space

new DataTable("#tour_itinerary_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Itinerary CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Itinerary Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Itinerary PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_photos_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Photos CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Photos Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Photos PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_other_info_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Other Info CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Other Info Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Other Info PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_inclusions_exclusions_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Inclusions-Exclusions CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Inclusions-Exclusions Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Inclusions-Exclusions PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_contact_us_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Contact Us CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Contact Us Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Contact Us PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_get_in_touch_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Get In touch CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Get In touch Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Get In touch PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_category_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Category CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Category Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Category PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_booking_details_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Booking Details CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Booking Details Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			orientation: "landscape", // Set orientation to landscape
			filename: function () {
				return "Tour Booking Details PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tour_about_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour About CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour About Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour About PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#state_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "States CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "States Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "States PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tuor_place_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Place CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Place Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Place PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#tuor_destination_details_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Destination Details CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Destination Details Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Destination Details PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#country_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Country CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Country Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Country PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});

new DataTable("#terms_conditions_tbl", {
	dom: "Bfrtip",
	buttons: [
		{
			extend: "csv",
			text: "CSV",
			filename: function () {
				return "Tour Terms and Conditions CSV " + currentDateTime;
			},
		},
		{
			extend: "excel",
			text: "Excel",
			filename: function () {
				return "Tour Terms and Conditions Excel " + currentDateTime;
			},
		},
		{
			extend: "pdf",
			text: "PDF",
			filename: function () {
				return "Tour Terms and Conditions PDF " + currentDateTime;
			},
		},
	],
	// aaSorting: [[0, "desc"]],
	bDestroy: true,
});
