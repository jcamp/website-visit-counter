# website-visit-counter
General visit counter for websites. Uses a text file to hold the current visit count and normal PHP / JS.

Very simple visit counter for a website. A bit retro but had a client who wanted one. :)

This could also be used to display any type of counter. In this example I am using it as a counter for the number of visits to a page, but could measure any other method that needs to store a counter in a file and display the results after incrementing in a web page.

Counter.php does the serverside code of retrieving the value of the counter from a text file, and incrementing or setting the value to 0 if the file does not exist. The counter.js (or if you put the JS in the actual html file) will increment the counter and display at a position in the HTML where the counter was called from (see the sample counter.html file for an example of use).

If you put the javascript directly into your webpage (html file) the external counter.js is not needed.

counter.php

First set the file path where we'll store the counter value. We check if the file exists and read the current counter value from the file, or set the counter to 0 if the file doesn't exist.

If the request method is POST, we assume it's an update to the counter value. We get the new counter value from the request body, write it to the file, and send a success response with the new counter value in the response body.

If the request method is not POST, we assume it's a GET request to retrieve the current counter value. We send the current counter value as a JSON response in the response body.

Note that you'll need to make sure the file path in the script matches the file path where you want to store the counter value. You'll also need to make sure that the URLs in the JavaScript code match the URL where this PHP script is hosted.

counter.js

First make an HTTP GET request to the server to retrieve the current counter value. We assume that the server returns a JSON object with a counter property that holds the current value.

We then update the HTML element that displays the counter value on the page with the retrieved value.

On every page visit, we increment the counter value and make an HTTP POST request to the server to update the counter value. We send the updated value in a JSON payload in the request body.

Note that you'll need to replace the URLs in the fetch() calls with the actual server URLs that handle the counter value storage and retrieval. Additionally, you'll need to update the HTML element ID that displays the counter value with the actual ID of the element on your page.

counter.html (example call in the web page)

HTML page that displays the number of views of the page using a span element with an ID of counter-value.

In the JavaScript code, we make an HTTP GET request to the server-side PHP script to retrieve the current counter value. We update the span element with the retrieved value.

We then increment the counter value and make an HTTP POST request to the PHP script to update the counter value on the server.

Note that you'll need to make sure that the URLs in the JavaScript code match the URL where the PHP script is hosted. Additionally, you'll need to make sure that the file path in the PHP script matches the file path where you want to store the counter value.
