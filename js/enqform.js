$(document).ready(function () {
	$("#submitBtn").click(function () {
		var name = $('#name').val();
		var phone = $('#phone').val();
		var fromp = $('#fromp').val();
		var top = $('#top').val();
		var selectoption = $('#selectoption').val();
		var email = $('#email').val();
		var message = $('#message').val();
		var dateofmoving = $('#dateofmoving').val();

		if ((typeof (name) == undefined && name == '' && typeof (phone) == undefined && phone == '' && typeof (fromp) == undefined && fromp == '' && typeof (top) == undefined && top == '')) {
			return;
		}
		var formData = {
			'name': name, 'phone': phone, 'fromp': fromp, 'top': top, 'selectoption': selectoption, 'email':email, 'message': message, 'dateofmoving': dateofmoving
		}

		$.ajax({
			type: "POST",
			url: "/server/api/mail/send",
			data: formData,
			dataType: "json",
		}).done(function (data) {
			data = JSON.stringify(data);
			let res = JSON.parse(data) 
			if(res.status == 'OK'){ alert('Enquiry sent!!') } else { alert('something went wrong. !!') }
		});

	});
	return
});
