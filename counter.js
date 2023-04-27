// Send an HTTP request to the server to retrieve the current counter value
fetch('/counter.php')
  .then(response => response.json())
  .then(data => {
    // Set the counter value to the retrieved value
    let counter = data.counter;

    // Update the HTML element that displays the counter value
    document.getElementById('counter-value').textContent = counter;

    // Increment the counter value and send an HTTP request to the server to update it
    counter++;
    fetch('/counter.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ counter: counter })
    });
  });
