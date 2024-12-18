<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Qualification Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Qualification Details</h2>
        <form method="POST" id="form1">
            @csrf
            @foreach ($qualifications as $qualification)
                <div class="form-group mb-3">
                    <div class="row">
                        <!-- Checkbox for Qualification -->
                        <div class="col-2">
                            <label class="form-check-label">{{ $qualification->name }}</label>
                            <input type="checkbox" class="form-check-input ms-5 qualification-checkbox"
                                data-qualification="{{ $qualification->name }}" name="qualifications[]"
                                value="{{ $qualification->id }}">
                        </div>

                        <!-- Special Qualifications Dropdown -->
                        <div class="col-4">
                            <select name="special_qualifications" class="form-control special-qualification-select"
                                disabled>
                                <option value="" selected disabled>Select the stream</option>
                                @foreach ($qualification->specialQualifications as $specialQualification)
                                    <option value="{{ encrypt($specialQualification->id) }}">
                                        {{ $specialQualification->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            const selected = [];
            $(".form-check-input").change(function() {
                if ($(this).is(":checked")) {
                    $(this).parent().parent().find("select").removeAttr("disabled");
                } else {
                    $(this).parent().parent().find("select").prop('selectedIndex', 0);
                    $(this).parent().parent().find("select").attr("disabled", true);
                }

            })

            $("#form1").submit(function(e) {
                e.preventDefault();
                let qualifications = [];
                $(".qualification-checkbox:checked").each(function() {
                    qualifications.push($(this).parent().parent().find("select").val());
                });
                $.ajax({
                    urL: "{{ route('qualification.store') }}",
                    type: "POST",
                    data: {
                        qualifications: qualifications
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        alert("Qualifications saved successfully!");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })

        });
    </script>
</body>

</html>
