@extends('layouts.admin-navbar')
@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Genre</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('auditorium.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="post" id="auditoriumForm" name="auditoriumForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="seat_no">Number of seat</label>
                                    <input type="number" name="seat_no" id="seat_no" class="form-control" placeholder="Number Of Seat" max="100" min="20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{route('auditorium.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection
@section('customJs')
    <script>
        $("#auditoriumForm").submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var element = $(this);
            $("button[type=submit]").prop('disabled', true); // Disable submit button

            $.ajax({
                url: '{{ route('auditorium.store') }}', // Assuming route is defined for auditorium store
                type: 'post',
                data: element.serializeArray(), // Serialize form data
                dataType: 'json',
                success: function(response) {
                $("button[type=submit]").prop('disabled', false); // Enable submit button

                if (response["status"] == true) {
                    window.location.href = '{{ route('auditorium.index') }}'; // Redirect to auditorium index

                    // Clear any previous errors (adjust selectors as needed)
                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $("#seat_no").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html(""); // Assuming you have a field with id="seat_no"
                } else {
                    var errors = response['errors'];

                    // Display specific errors (adjust selectors as needed)
                    if (errors['name']) {
                    $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name'][0]); // Added [0] to access first error message
                    }
                    if (errors['seat_no']) {
                    $("#seat_no").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['seat_no'][0]); // Added [0] to access first error message
                    }
                }
                },
                error: function(jqXHR, exception) {
                console.log("Something went wrong:", exception); // Log for debugging
                // Handle error gracefully, display a user-friendly message
                }
            })
            })
    </script>
@endsection
