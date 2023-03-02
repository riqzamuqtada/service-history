$(function () {

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function previewGambar(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
        }

        reader.readAsDataURL(input.files[0])

    }

    $('#foto').change(function () {
        previewGambar(this);
    })

    var jService = $('#dataChart').data('service');
    var jPenempatan = $('#dataChart').data('penempatan');
    var jUnit = $('#dataChart').data('unit');
    var jNotes = $('#dataChart').data('notes');

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("Chart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Service", "Penempatan", "Unit", "Notes"],
            datasets: [{
                data: [jService, jPenempatan, jUnit, jNotes],
                backgroundColor: ['#4e73df', '#de5a4e', '#1cc88a', '#f6c23e'],
                hoverBackgroundColor: ['#2e59d9', '#d93c2e', '#17a673', '#c7971e'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });


});