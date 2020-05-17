import { compareDates } from "../components/compareDates.js";
import localization, { i18n } from "../components/localization.js";

if ($("input[name = 'design']").val() < 1 || $("input[name = 'design']").val() > 3) {
	location.href = "templates.php";
}

localization();

$(document).ready(function () {
	$("input[name='home']").change(function () {
		$(this).removeClass("is-invalid");
	});

	$("#start-geolocalization").click(function () {
		getLocation();
		window.setTimeout(function () {
			$(".alert").fadeOut("slow");
		}, 3000);
	});

	$("button")
		.filter(":nth-child(2n)")
		.click(function () {
			$(".check-fieldset").removeAttr("required");
		});

	var countProExp = 1;
	var countEdu = 1;

	$(".add-fields > svg, .del-fields > svg").click(function () {
		//prettier-ignore
		let proExp = "<div class='form-group dynamic'><div class='form-group'><h5># " + countProExp + "</h5><hr></div>"
		+ "<div class='form-row'>"
		+ "<div class='form-group col-md-3'>"
		+ "<label for='date_job_start_" + countProExp + "'>" + i18n.__("Enter the job start date") + "</label>"
		+ "<input type='date' class='form-control' name='date_job_start_" + countProExp  + "' min='1900-01-01'>"
		+ "<div class='invalid-feedback'>" + i18n.__("The date entered is higher than the end date") + "</div></div>"
		+ "<div class='col-md-3'>"
		+ "<div class='form-group'>"
		+ "<label for='date_job_end_" + countProExp + "'>" + i18n.__("Indicate the end date of the jobs") + "</label>"
		+ "<input type='date' class='form-control' name='date_job_end_" + countProExp + "' min='1900-01-01'>"
		+ "<div class='invalid-feedback'>" + i18n.__("The date entered is before the start date") + "</div></div>"
		+ "<div class='form-group custom-control custom-checkbox'>"
		+ "<input class='custom-control-input' type='checkbox' id='current_job_" + countProExp + "' name='current_job_" + countProExp + "'>"
		+ "<label class='custom-control-label' for='current_job_" + countProExp + "'>" + i18n.__("Current job") + "</label></div></div>"
		+ "<div class='form-group col-md-6'>"
		+ "<label for='job_" + countProExp + "'>" + i18n.__("Position or position occupied") + "</label>"
		+ "<input type='text' class='form-control' name='job_" + countProExp + "'></div></div>"
		+ "<div class='form-row'>"
		+ "<div class='form-group col-md'>"
		+ "<label for='employer_name_" + countProExp + "'>" + i18n.__("Name of employer") + "</label>"
		+ "<input type='text' class='form-control' name='employer_name_" + countProExp + "'></div>"
		+ "<div class='form-group col-md-3'>"
		+ "<label for='employer_city_" + countProExp + "'>" + i18n.__("Employer City") + "</label>"
		+ "<input type='text' class='form-control' name='employer_city_" + countProExp + "'></div>"
		+ "<div class='form-group col-md-3'>"
		+ "<label for='employer_country_" + countProExp + "'>" + i18n.__("Employer Country") + "</label>"
		+ "<input type='text' class='form-control' name='employer_country_" + countProExp + "'></div></div></div>";

		// prettier-ignore
		let Edu = "<div class='form-group dynamic'><div class='form-group'><h5># " + countEdu + "</h5><hr></div>"
		+ "<div class='form-row'>"
		+ "<div class='form-group col-md-3'>"
		+ "<label for='date_education_start_" + countEdu + "'>" + i18n.__("Indicate the start date of the study") + "</label>"
		+ "<input type='date' class='form-control' name='date_education_start_" + countEdu + "' min='1900-01-01'>"
		+ "<div class='invalid-feedback'>" + i18n.__('The date entered is higher than the end date') + "</div></div>"
		+ "<div class='col-md-3'>"
		+ "<div class='form-group'>"
		+ "<label for='date_education_end_" + countEdu + "'>" + i18n.__("Indicate the end date of the study") + "</label>"
		+ "<input type='date' class='form-control' name='date_education_end_" + countEdu + "' min='1900-01-01'>"
		+ "<div class='invalid-feedback'>" + i18n.__("The date entered is before the start date") + "</div></div>"
		+ "<div class='form-group custom-control custom-checkbox'>"
		+ "<input class='custom-control-input' type='checkbox' id='current_education_" + countEdu + "' name='current_education_" + countEdu + "'>"
		+ "<label class='custom-control-label' for='current_education_" + countEdu + "'>" + i18n.__("Current study") + "</label></div></div>"
		+ "<div class='form-group col-md-6'>"
		+ "<label for='title_" + countEdu + "'>" + i18n.__("Title of qualification awarded") + "</label>"
		+ "<input type='text' class='form-control' name='title_" + countEdu + "'></div></div>"
		+ "<div class='form-row'>"
		+ "<div class='form-row col'>"
		+ "<div class='form-group col-md-12'>"
		+ "<label for='school_name_" + countEdu + "'>" + i18n.__("Name of the organization that provided your education") + "</label>"
		+ "<input type='text' class='form-control' name='school_name_" + countEdu + "'></div>"
		+ "<div class='form-group col-md'>"
		+ "<label for='school_city_" + countEdu + "'>" + i18n.__("Organization location") + "</label>"
		+ "<input type='text' class='form-control' name='school_city_" + countEdu + "'></div>"
		+ "<div class='form-group col-md'>"
		+ "<label for='school_country_" + countEdu + "'>" + i18n.__("Organization country") + "</label>"
		+ "<input type='text' class='form-control' name='school_country_" + countEdu + "'></div></div>"
		+ "<div class='form-row col'>"
		+ "<div class='form-group col-md'>"
		+ "<label for='acquired_skills_" + countEdu + "'>" + i18n.__("Main subjects taken and professional skills acquired") + "</label>"
		+ "<textarea class='form-control' rows='4' name='acquired_skills_" + countEdu + "'></textarea></div></div></div></div>";

		if ($(this).parent().parent().is($(".check-fieldset").first())) {
			countProExp = elementsDynamic($(this).parent(), proExp, countProExp);
			$("input[name = 'countProExp']").val(countProExp);
		} else {
			countEdu = elementsDynamic($(this).parent(), Edu, countEdu);
			$("input[name = 'countEdu']").val(countEdu);
		}

		function elementsDynamic(element, data, count) {
			if ($(element).hasClass("add-fields") === true) {
				if (count === 1) {
					$(element).parent().find($(".del-fields")).show();
				}
				$(data).appendTo($(element).parent());
				count++;
			} else {
				if (count === 2) {
					$(element).parent().find($(".del-fields")).hide();
				}
				$(element).parent().find("div.dynamic:last-child").remove();
				count--;
			}
			return count;
		}
	});

	$(".check-fieldset", this).on("change", "div.dynamic", function () {
		let count = 0;
		$("input:not([type='checkbox']), textarea", this).each(function (_i) {
			if ($(this).val() !== "") {
				count++;
			}
		});

		if (count !== 0 || $("input[type='checkbox']", this).is(":checked")) {
			if ($("input:checkbox", this).is(":checked")) {
				$("input[type='date']", this).last().val("");
				$("input[type='date']", this).last().attr("readonly", true);
			}
			$("input:not([type='checkbox']), textarea", this).attr("required", true);
		} else {
			$("input[type='date']", this).last().removeAttr("readonly");
			$("input:not([type='checkbox']), textarea", this).removeAttr("required");
		}

		$("input[type='date']", this)
			.first()
			.change(function () {
				checkStartDate($(this), $("input[type='date']", this).last());
			});

		$("input[type='date']", this)
			.last()
			.change(function () {
				checkEndDate($("input[type='date']", this).first(), $(this));
			});

		function checkStartDate(startDate, endDate) {
			if (
				$(endDate).val() !== "" &&
				$(startDate).val() !== "" &&
				compareDates($(startDate).val(), $(endDate).val()) === false
			) {
				$(startDate).addClass("is-invalid");
			} else {
				$(startDate).removeClass("is-invalid");
			}
		}

		function checkEndDate(startDate, endDate) {
			if (
				$(endDate).val() !== "" &&
				$(startDate).val() !== "" &&
				compareDates($(startDate).val(), $(endDate).val()) === false
			) {
				$(endDate).addClass("is-invalid");
			} else {
				$(endDate).removeClass("is-invalid");
			}
		}
	});

	function getLocation() {
		if (navigator.geolocation) {
			if (window.location.protocol === "http:") {
				$(".text_error").text(i18n.__("You need HTTPS to access geolocation"));
				$(".alert").show();
			} else {
				navigator.geolocation.getCurrentPosition(obtainData, getError);
			}
		} else {
			$(".text_error").text(i18n.__("Geolocation is not supported by this browser"));
			$(".alert").show();
		}
	}

	function getError(error) {
		switch (error.code) {
			case error.PERMISSION_DENIED:
				$(".text_error").text(i18n.__("User denied the request for Geolocation"));
				break;
			case error.POSITION_UNAVAILABLE:
				$(".text_error").text(i18n.__("Location information is unavailable"));
				break;
			case error.TIMEOUT:
				$(".text_error").text(i18n.__("The request to get user location timed out"));
				break;
			case error.UNKNOWN_ERROR:
				$(".text_error").text(i18n.__("An unknown error occurred"));
				break;
		}
		$(".alert").show();
	}

	function obtainData(position) {
		var latitude = position.coords.latitude;
		var longitude = position.coords.longitude;

		var URL = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}&accept-language=<browser language string>`;

		$.ajax({
			url: URL,
			method: "GET",
			dataType: "json",
			success: function (file) {
				if ($(file.address).find("road").length > 0) {
					$("input[name='home']").val(file.address.road);
				} else {
					$("input[name='home']").addClass("is-invalid");
				}
				$("input[name = 'city']").val(file.address.city);
				$("input[name = 'country']").val(file.address.country);
				$("input[name = 'postal_code']").val(file.address.postcode);
			},
			error: function (error) {
				console.log(error.responseText);
				$(".text_error").text(i18n.__("There was an error getting the information from OpenStreetMaps"));
				$(".alert").show();
			},
		});
	}
});
