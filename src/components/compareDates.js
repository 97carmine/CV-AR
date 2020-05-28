export function compareDates(dateStart, dateEnd) {
	var result;
	var date1 = new Date(dateStart);
	var date2 = new Date(dateEnd);

	if (date1 < date2) {
		result = true;
	} else {
		result = false;
	}
	return result;
}
