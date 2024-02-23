// Your JavaScript file or script tag in your Blade file
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

function submitForm() {
    var formData = new FormData(document.getElementById('yourForm'));

    $.ajax({
        type: 'POST',
        url: "{{ route(uploads/'.Auth::user()->id) }}",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            // Handle the success response here
        },
        error: function(error) {
            console.log(error);
            // Handle the error response here
        }
    });
}