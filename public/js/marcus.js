$("#departament").change(event => {
	$.get(`/schools/create/${event.target.value}`, function(res, sta){
		$("#province").empty();
		res.forEach(element => {
			$("#province").append(`<option value=${element.id}> ${element.province} </option>`);
		});
	});
});