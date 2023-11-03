<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data received from the backend
    const totalIncome = {{ $totalIncome }}; // Assuming $totalIncome is passed from the controller
    const totalOrders = {{ $totalOrders }};
    const totalQuotes = {{ $totalQuotes }};
    // Assuming $totalOrders is passed from the controller

    // Get the canvas element
    const ctx = document.getElementById('myPieChart').getContext('2d');

    // Create the pie chart
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Total Income', 'Total Orders', 'Total Quotes'],
            datasets: [{
                label: 'Data',
                data: [totalIncome, totalOrders, totalQuotes],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 0.6)', // Color for Total Income
                    'rgba(54, 162, 235, 0.6)', // Color for Total Orders
                ],
                borderColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 1, // This defines the aspect ratio (width/height) of the chart
            maintainAspectRatio: false, // Make a smaller hole at the center
            plugins: {
                legend: {
                    position: 'bottom',
                },
            }
        }
    });
</script>
