$(document).ready(function () {
	$('#VisitorDt').DataTable();
	$('.dataTables_length').addClass('bs-select');

});

function getservicesdata() {

	axios.get('/getservicesdata').then(function (response) {
		var jsondata = response.data;
		var service_list = '';
		$.each(jsondata, function (key, value) {
			service_list += '<tr>' + '<th class="th-sm"><img class="table-img" src="' + value.service_img + '"></th>' +
				'<th class="th-sm">' + value.service_name + '</th>' +
				'<th class="th-sm">' + value.service_des + '</th>' +
				'<th class="th-sm"><a class="edit-btn" data-toggle="modal" data-target="#exampleModal" data-id="' + value.id + '"   href=""><i class="fas fa-edit"></i></a></th>' +
				'<th class="th-sm"><a href="" class="service-delete-btn" data-id="' + value.id + '"><i class="fas fa-trash-alt"></i></a></th></tr>';

		});
		$('#services_table').html(service_list);

		// add services
		$('#add-services-btn').on('click', function () {
			var name = $('#add-service-name').val();
			var des = $('#add-service-des').val();
			AddServices(name, des);

		});


		// edit services
		$(document).on('click', '.edit-btn', function () {
			var id = $(this).data('id');
			var node = this;
			GetDetails(id);
			$('#update-btn').on('click', function () {
				var name = $('#service-name').val();
				var des = $('#service-des').val();
				UpdateService(id,name, des, node);
			});
		
		
		});
		$(document).on('click', '.service-delete-btn', function (e) {
			e.preventDefault();
			var id = $(this).data('id');
			var node = this;
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					DeleteServices(id,node);
					
			
		
				}
			})
		});

			$('#ServicesTable').DataTable();
			$('.dataTables_length').addClass('bs-select');
	});
}


function GetDetails(id){
	axios.post('/singleservicedata', { id: id }).then(function (Response) {
		$('#service-name').val(Response.data.service_name);
		$('#service-des').val(Response.data.service_des);
	});

}
//add

function AddServices(name, des) {
	var payload = JSON.stringify({ name: name, des: des });

	axios.post('/addservicedata', payload, {
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(function (Response) {
		if (Response.data.success == 'True') {
			getservicesdata();
			$('#AddModel').modal('toggle');

		}
		// console.log(Response.data);
	});
}










// edit

function UpdateService(id,name, des, node) {
	var payload = JSON.stringify({ id: id, name: name, des: des });
	axios.post('/updatesingleservicedata', payload, {
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(function (Response) {
		if (Response.data.success == 'True') {
			$('#exampleModal').modal('toggle');
			var row = $(node).closest('tr');
			$(row).find(':nth-child(2)').text(name);
			$(row).find(':nth-child(3)').text(des);
		}
	});
}

// delete 

function DeleteServices(id , node){
	axios.post('/deleteservicesdata', { id: id }).then(function (Response) {
		if (Response.data['status'] == 'success') {
			Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
			)
			$(node).closest('tr').remove();
		}
		else {
			'Canceled!',
				'Your file has been deleted.',
				'success'
		}
	});
}