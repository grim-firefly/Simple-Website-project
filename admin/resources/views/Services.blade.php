@extends('Layout.app')
@section('title')
    Services
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Description</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="services_table">





                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('Script')
    <script type="text/javascript">
        function getservicesdata() {

            axios.get('{{url('getservicesdata')}}').then(function(response) {
                var jsondata = response.data;
                $.each(jsondata, function (key, value) {
                	$('#services_table').append(
                		'<tr>'+'<th class="th-sm"><img class="table-img" src="'+value.service_img+'"></th>'+
                			'<th class="th-sm">'+value.service_name+'</th>'+
                			'<th class="th-sm">'+value.service_des+'</th>'+
                			'<th class="th-sm"><a href=""><i class="fas fa-edit"></i></a></th>'+
                			'<th class="th-sm"><a href=""><i class="fas fa-trash-alt"></i></a></th></tr>'
                	);
                });

            });
        }
        getservicesdata();
    </script>
@endsection
