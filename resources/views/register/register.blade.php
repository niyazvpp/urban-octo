<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compact Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container p-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-md-6 mx-auto">
                    <h1 class="text-center">Sign Up</h1>
                    <form method="post" id="form">
                        <div class="form-group mb-3">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>DOB</label>
                            <input type="date" name="dob" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Phone</label>
                            <input type="number" name="phone_number" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Mahall</label>
                            <select name="mahall" id="mahall" class="form-control">
                                @foreach ($mahalls as $id => $mahall)
                                    <option value="{{ $id }}">{{ $mahall }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('register.store') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: formData,
                success: function(response) {
                    location.href = "{{ route('home') }}"
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })
    });
</script>

</html>
