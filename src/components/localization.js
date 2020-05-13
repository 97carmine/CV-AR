import gettext from "../libraries/gettext.js";

var localization = function () {
	let locale = navigator.language.substr(0, 2);

	$.getJSON("locale/" + locale + "/LC_MESSAGES/default.json", function (jsonData) {
		gettext().loadJSON(jsonData, "messages");
		gettext().setLocale(locale);
	})
		.done(function () {
			console.log("Se ha establecido el idioma a " + locale);
		})
		.fail(function () {
			console.log("Error al establecer el idioma a " + locale);
		});
};

export const i18n = gettext();
export default localization;
