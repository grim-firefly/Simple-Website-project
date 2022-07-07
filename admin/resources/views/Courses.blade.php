@extends('Layout.app')
@section('title')
    Courses
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" id="add-new-course" data-toggle="modal" data-target="#AddModel"
                    class="btn btn-secondary ml-5 mt-5" style="margin-bottom:-15px;">Add new</button>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5">
                    <table id="CoursesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Fee</th>
                                <th class="th-sm">Enroll</th>
                                <th class="th-sm">class</th>
                                <th class="th-sm">Options</th>
                            </tr>
                        </thead>
                        <tbody id="services_table">


                        </tbody>
                    </table>

                </div>
            </div>
        </div>




        <div class="modal fade" id="AddModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                        <form id="add-course">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="add-course-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Course Fee:</label>
                                <input type="text" class="form-control" id="add-course-fee">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Course class:</label>
                                <input type="text" class="form-control" id="add-course-class">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="add-course-des"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="add-course-btn">Add Courses</button>
                    </div>
                </div>
            </div>
        </div>




        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Courses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                        <form id="add-course">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="edit-course-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Course Fee:</label>
                                <input type="text" class="form-control" id="edit-course-fee">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Course class:</label>
                                <input type="text" class="form-control" id="edit-course-class">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="edit-course-des"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="update-btn">save Courses</button>
                    </div>
                </div>
            </div>
        </div>















        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Services</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="service-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="service-des"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update-btn">Save Changes</button>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection



    @section('Script')
        <script type="text/javascript">
            function getcoursesdata() {

                axios.get("{{ route('Courses.GetData') }}").then(function(response) {
                    var jsondata = response.data;
                    var service_list = '';

                    $.each(jsondata, function(key, value) {
                        service_list += '<tr>' + '<th class="th-sm">' + value.course_name + '</th>' +
                            '<th class="th-sm">' + value.course_fee + '</th>' +
                            '<th class="th-sm">' + value.course_totalenroll + '</th>' +
                            '<th class="th-sm">' + value.course_totalclass + '</th>' +
                            '<th class="th-sm"><a class=" edit-btn" data-toggle="modal" data-target="#exampleModal" data-id="' +
                            value.id +
                            '"   href="">   <i class="fas fa-edit"></i></a><a href="" class="ml-1 course-delete-btn" data-id="' +
                            value.id +
                            '"><i class="fas fa-trash-alt"></i></a><a class="ml-1 course-details-btn" data-id="' +
                            value.id +
                            '">   <i class="fas fa-eye"></i></a></th></tr>';

                    });
                    $('#services_table').html(service_list);

                    //delete
                    $(document).on('click', '.course-delete-btn', function(e) {
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
                                DeleteCourse(id);

                            }
                        })
                    });

                    $('#add-course-btn').on('click', function() {
                        var name = $('#add-course-name').val();
                        var des = $('#add-course-des').val();
                        var fee = $('#add-course-fee').val();
                        var course_class = $('#add-course-class').val();
                        AddCourses(JSON.stringify({
                            name: name,
                            des: des,
                            fee: fee,
                            class: course_class
                        }));

                    });
                    $(document).on('click', '.edit-btn', function() {
                        var id = $(this).data('id');
                        var node = this;
                        GetDetails(id);
                        $('#update-btn').on('click', function() {
                            var name = $('#edit-course-name').val();
                            var des = $('#edit-course-des').val();
                            var fee = $('#edit-course-fee').val();
                            var course_class = $('#edit-course-class').val();

                            UpdateCourse(id, name, des, fee, course_class, node);


                        });


                    });


                    $('#CoursesTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');

                });

            }
            //update
            function UpdateCourse(id, name, des, fee, course_class, node) {
                var payload = JSON.stringify({
                    id: id,
                    name: name,
                    des: des,
                    fee: fee,
                    class: course_class
                });
                axios.post("{{ route('Courses.Update') }}", payload, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function(Response) {
                    if (Response.data.success == 'True') {
                        var row = $(node).closest('tr');
                        $(row).find('th:nth-child(1)').text(name);
                        $(row).find('th:nth-child(2)').text(fee);
                        $(row).find('th:nth-child(3)').text(course_class);
                        $(row).find('th:nth-child(4)').text(course_class);
                        $('#exampleModal').modal('toggle');


                    }
                });
            }


            // get details
            function GetDetails(id) {
                axios.post("{{ route('Courses.GetCourseData') }}", {
                    id: id
                }).then(function(Response) {
                    $('#edit-course-name').val(Response.data.course_name);
                    $('#edit-course-des').val(Response.data.course_des);
                    $('#edit-course-fee').val(Response.data.course_fee);
                    $('#edit-course-class').val(Response.data.course_totalclass);
                });

            }
            // add courses
            function AddCourses(payload) {

                axios.post("{{ route('Courses.Insert') }}", payload, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function(Response) {
                    if (Response.data.success == 'True') {
                        $('#CoursesTable').DataTable().destroy();
                        getcoursesdata();
                        $('#AddModel').modal('toggle');

                    }
                    // console.log(Response.data);
                });
            }




            function DeleteCourse(id) {
                axios.post(" {{ route('Courses.delete') }} ", {
                    id: id
                }).then(function(Response) {
                    if (Response.data['status'] == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        $('#CoursesTable').DataTable().destroy();
                        getcoursesdata();
                    } else {
                        'Canceled!',
                        'Your file has been deleted.',
                        'success'
                    }
                });
            }



            getcoursesdata();
        </script>
    @endsection
