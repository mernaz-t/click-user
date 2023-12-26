// script.js
document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function () {
       fetch('/counter.php')
          .then(response => response.json())
          .then(data => {
             console.log('Clicks:', data.clicks, 'Visits:', data.visits);
 
             document.getElementById('clickCount').innerText = 'Clicks: ' + data.clicks;
             document.getElementById('visitCount').innerText = 'Visits: ' + data.visits;
          });
    });
 });
 