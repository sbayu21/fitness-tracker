// Placeholder for Chart.js setup
const ctx = document.getElementById('progressChart');
if (ctx) {
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
      datasets: [{
        label: 'Duration (min)',
        data: [30, 45, 60, 50, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    }
  });
}