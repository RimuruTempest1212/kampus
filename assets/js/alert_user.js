// Wrap the code in a function to avoid polluting the global namespace
function initializeDeleteButton() {
    $(document).on('click', '.delete-button', function (e) {
        e.preventDefault(); // Prevent the default behavior of the link

        // Get the href attribute from the link (delete URL)
        var deleteUrl = $(this).attr('href');

        // Show SweetAlert confirmation
        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "Yes, delete it!", redirect to the delete URL
                window.location.href = deleteUrl;
            }
        });
    });
}

// Call the function to initialize the delete button functionality
initializeDeleteButton();


// function initializeUpdateButton() {
    // $('#UpdateForm').submit(function (e) {
    //     e.preventDefault(); // Prevent the default form submission

    //     // Serialize the form data
    //     var formData = new FormData($(this)[0]);

    //     // Use AJAX to submit the form
    //     $.ajax({
    //         type: 'POST',
    //         url: $(this).attr('action'),
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function (response) {
    //             // Handle the success response here

    //             // Show SweetAlert confirmation
    //             Swal.fire({
    //                 title: "Apakah Anda ingin menyimpan perubahan?",
    //                 showDenyButton: true,
    //                 showCancelButton: true,
    //                 confirmButtonText: "Simpan",
    //                 denyButtonText: `Batal`
    //               }).then((result) => {
    //                 /* Read more about isConfirmed, isDenied below */
    //                 if (result.isConfirmed) {
    //                     Swal.fire("Simpan!", "", "success").then(() => {
    //                         // Redirect to "daftarbuku" after saving
    //                         window.location.href = "daftarbuku";
    //                     });
    //                 } else if (result.isDenied) {
    //                   Swal.fire("Perubahan tidak disimpan", "", "info");
    //                 }
    //               });
    //         },
    //         error: function (error) {
    //             // Handle the error response here
    //             console.error('Error:', error);
    //         }
    //     });
    // });
// }

// Call the function to initialize the delete button functionality
// initializeUpdateButton();


function initializeSavedButton() {
    // Bind the click event to the form submission
    $('#userForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = new FormData($(this)[0]);

        // Use AJAX to submit the form
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle the success response here

                // Show SweetAlert confirmation
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "User Berhasil ditambahkan",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect to 'daftarbuku'
                    window.location.href = "data_user";
                });
            },
            error: function (error) {
                // Handle the error response here
                console.error('Error:', error);
            }
        });
    });
}




function checkForSavedMessageAndRedirect() {
    // ... your existing code ...
}

$(document).ready(function () {
    initializeDeleteButton();
    initializeSavedButton();
    initializeUpdateButton(); // Call the new function for edit
    checkForSavedMessageAndRedirect();
    // Initialize any other functions or event listeners you need
});


