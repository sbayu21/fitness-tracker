fetch("chart_data.php")
  .then(response => response.json())
  .then(data => {
    const labels = data.map(row => row.date);
    const durations = data.map(row => row.total_duration);

    new Chart(document.getElementById("progressChart"), {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: "Workout Duration (minutes)",
          data: durations,
          borderColor: "#2b6cb0",
          backgroundColor: "#2b6cb055",
          tension: 0.3,
          fill: true
        }]
      }
    });
  });