<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Email Verification</h3>
                <div id="status" class="my-3"></div>
                <form id="verify-form">
                    <div class="mb-3">
                        <label for="otp" class="form-label">Enter OTP</label>
                        <input type="text" class="form-control" id="otp" name="otp"
                            placeholder="Enter the OTP">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Verify</button>
                </form>
                <div class="mt-3 text-center">
                    <p>Didn't receive the OTP?</p>
                    <button id="resend-otp" class="btn btn-secondary">Resend OTP</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            sendOtp();

            function sendOtp() {
                $("#resend-otp").prop('disabled', true);
                setTimeout(() => {
                    $("#resend-otp").prop('disabled', false);
                }, 20000);
                $.ajax({
                    url: "{{ route('send_otp') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: "",
                    success: function(response) {

                        $("#status").html(
                            "<div class='alert alert-success'>OTP sent successfully</div>");
                    },
                    error: function(xhr, status, error) {
                        const response = xhr.responseJSON; // Parse the JSON response
                        const remaining = response && response.remaining ? response.remaining : null;
                        const message = response && response.message ? response.message :
                            'Failed to send OTP';

                        $("#status").html(
                            `<div class='alert alert-danger'>
                        ${error}${remaining ? `, Please try again in ${Math.round(remaining)} seconds.` : ''}
                    </div>`
                        );
                    }
                });
            }
            $("#resend-otp").click(function() {
                sendOtp();
            });

            $("#verify-form").submit(function(e) {
                e.preventDefault();
                const otp = $("#otp").val();
                $.ajax({
                    url: "{{ route('verify_otp') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        otp
                    },
                    success: function(response) {
                        $("#status").html(
                            "<div class='alert alert-success'>OTP verified successfully</div>"
                        );
                        setTimeout(() => {
                            window.location.href = "{{ route('qualification.index') }}";
                        }, 1000)
                    },
                    error: function(xhr, status, error) {
                        const response = xhr.responseJSON; // Parse the JSON response
                        const message = response && response.message ? response.message :
                            'Failed to verify OTP';

                        $("#status").html(
                            `<div class='alert alert-danger'>
                        ${error}
                    </div>`
                        );
                    }
                });
            })

        })
    </script>
</body>

</html>
