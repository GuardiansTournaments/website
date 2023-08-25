// Set the date to countdown to (format: year, month (0-11), day, hours, minutes, seconds)
var countdownDate = new Date(2023, 6, 15, 20, 00, 00).getTime();

// Update the countdown every second
var countdownInterval = setInterval(function () {
    var now = new Date().getTime();
    var distance = countdownDate - now;

    // Calculate remaining time
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the countdown
    document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";

    // If the countdown is finished, display a message
    if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById("countdown").innerHTML = "Tournament Started!";
    }
}, 1000);


//click like

var clickCount = 0;

// Check if the clickCount is already stored in localStorage
var storedClickCount = localStorage.getItem('clickCount');
if (storedClickCount) {
    clickCount = parseInt(storedClickCount);
    document.getElementById('count').innerHTML = clickCount;
    document.getElementById('button').disabled = true;
} else {
    clickCount = 0;
}

function incrementClickCount() {
    clickCount++;
    document.getElementById('count').innerHTML = clickCount;
    document.getElementById('button').disabled = true;

    // Store the updated clickCount in localStorage
    localStorage.setItem('clickCount', clickCount);
}

function resetClickCount() {
    // Clear the clickCount from localStorage
    localStorage.removeItem('clickCount');

    clickCount = 0;
    document.getElementById('count').innerHTML = clickCount;
    document.getElementById('button').disabled = false;
}


//copy link

function copyCurrentPageURL() {
    var copyText = window.location.href;
    navigator.clipboard.writeText(copyText).then(function () {
        alert('Page URL copied!');
    }, function (error) {
        console.error('Unable to copy page URL: ', error);
    });
}

//leaderboard