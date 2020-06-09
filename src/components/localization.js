import i18n from "../libraries/gettext.esm.min.js";

const gettext = i18n();

var localization = function () {
	let locale = navigator.language.substr(0, 2);

	$.getJSON("locale/" + locale + "/LC_MESSAGES/default.json")
		.done(function (jsonData) {
			gettext.loadJSON(jsonData, "messages");
			console.log("Language = " + locale);
		})
		.fail(function () {
			console.log("Language setting error = " + locale);
		});
};

export { localization, gettext as i18n };
