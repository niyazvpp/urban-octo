<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest Areas Modal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-1 {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
        }

        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

        .interests {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 20px 0;
        }

        .interest {
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .interest:hover {
            transform: scale(1.1);
        }

        .interest img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            /* border: 2px solid #007BFF; */
        }

        .interest p {
            margin-top: 4px;
            height: 10px;
        }

        /* General skeleton loader style */
        .skeleton {
            background: #e0e0e0;
            /* Light grey background */
            position: relative;
            overflow: hidden;
        }

        /* Skeleton animation */
        @keyframes loading {
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: 200px 0;
            }
        }

        /* Skeleton for the image */
        .skeleton-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        /* Skeleton for the text */
        .skeleton-text,
        .skeleton-textt {
            height: 20px;
            width: 60%;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            margin-top: 10px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>

    <div class="modal-1">
        <div class="modal-content">
            <p class="ld">Loading...</p>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <h2>Select Your Interests</h2>
            <div class="interests">
                <div class="interest" data-id="1">
                    <!-- Skeleton loader for image -->
                    <div class="skeleton skeleton-image"></div>

                    <!-- Skeleton loader for text -->
                    <div class="skeleton skeleton-text" style="width: 80%;"></div>
                    <div class="skeleton skeleton-text" style="width: 60%;"></div>
                </div>

            </div>
            <button id="saveSelection">Save Selection</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const modal = $('#modal');
            const closeModalButton = $('#closeModal');
            const parent = $('.interests');
            const saveButton = $('#saveSelection');
            const loadingModal = $('.modal-1');
            let selectedInterests = [];

            // Open the modal
            function openModal() {
                modal.css('display', 'flex');
            }
            openModal();

            // Close the modal
            closeModalButton.on('click', function() {
                modal.css('display', 'none');
            });

            // Show loading state while fetching data
            function showLoadingState() {
                loadingModal.css('display', 'flex');
            }

            // Hide loading state once data is loaded
            function hideLoadingState() {
                loadingModal.css('display', 'none');
            }

            // Fetching interests and loading content
            $.ajax({
                url: "{{ route('interest.create') }}", // Your API route
                type: "get",
                success: function(response) {
                    hideLoadingState(); // Hide loading animation once data is loaded
                    parent.empty();

                    // Loop through areas and populate them in the modal
                    $.each(response.interests, function(index, item) {
                        parent.append(`
                    <div class="interest" data-id="${item.id}">
                        <div class="skeleton skeleton-image"></div>
                        <div class="skeleton skeleton-text" style="width: 80%;"></div>
                        <div class="skeleton skeleton-textt" style="width: 60%;"></div>
                    </div>
                `);
                    });

                    // Simulate delay and replace skeletons with actual content
                    setTimeout(function() {
                        $.each(response.interests, function(index, item) {
                            const interestDiv = $(
                                `.interest[data-id="${item.id}"]`);
                            interestDiv.find('.skeleton-image').replaceWith(
                                `<img src="https://picsum.photos/200/300" alt="${item.name}" id="${item.id}" class="interest-image">`
                            );
                            interestDiv.find('.skeleton-text').eq(0).replaceWith(
                                `<p class="interest-name">${item.name}</p>`);
                            interestDiv.find('.skeleton-textt').eq(0).replaceWith(
                                `<p class="interest-description">${item.description}</p>`
                            );
                        });
                        // Mark selected interests with a border
                        $('.interest').each(function() {
                            const interestId = parseInt($(this).data('id'), 10);
                            if (selectedInterests.includes(interestId)) {
                                $(this).find('img').css('border', '2px solid green');
                            }
                        });

                    }, 400); // Delay to simulate loading effect (1.5 seconds)

                    // Handle selected interests
                    $.each(response.interested, function(index, item) {
                        selectedInterests.push(item);
                    });


                    // Toggle selection on click
                    $('.interest').on('click', function() {
                        const interestId = parseInt($(this).data('id'), 10);
                        if (selectedInterests.includes(interestId)) {
                            selectedInterests = selectedInterests.filter(id => id !==
                                interestId);
                            $(this).find('img').css('border', '');
                        } else {
                            selectedInterests.push(interestId);
                            $(this).find('img').css('border', '2px solid green');
                        }
                    });
                },
                error: function(xhr) {
                    // Handle error and display the message if there is one
                    console.error('Error loading data:', xhr);
                },
                complete: function() {
                    // Handle after completion (e.g., re-enable the button if disabled)
                }
            });

            // Handle the Save button click
            saveButton.on('click', function() {
                if (selectedInterests.length < 1) {

                } else {
                    $.ajax({
                        url: "{{ route('interest.store') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                        },

                        data: {
                            interested_areas: selectedInterests,
                        },

                        success: function(response) {

                        },
                        error: function(xhr) {
                            alert('Registration failed');
                        },
                        complete: function() {
                            // Re-enable the button
                            $('#registerButton').prop('disabled', false).text('Register');
                            window.location.href = "{{ route('qualification.index') }}"
                        }
                    });
                    modal.css('display', 'none');
                }
            });
        });
    </script>
</body>

</html>
