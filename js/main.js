$(document).ready(function(){
    $("#searchData").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#getCurl tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#openModal").click(function() {
        document.getElementById("modal").style.display = "block";
    });
    $("#closeModal").click(function() {
        document.getElementById("modal").style.display = "none";
    });
    $('#uploadForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $('#uploadedImage').html(data);
            }
        });
    });
});

function fetch_data(){
    $.ajax({
        url: 'getData.php',
        type: 'GET',
        success: function (data) {
            $('#getCurl').html(data);
        }
    });
}

setInterval(function() {
    fetch_data();
}, 3600000);