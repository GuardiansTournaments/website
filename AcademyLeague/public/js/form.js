document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    var name = document.getElementsByName("name")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var subject = document.getElementsByName("sub")[0].value;
    var message = document.getElementsByName("message")[0].value;

    // Compose the email body
    var body = "Name: " + name + "\n";
    body += "Email: " + email + "\n";
    body += "Subject: " + subject + "\n";
    body += "Message: " + message;

    // Create a mailto link
    var mailtoLink = "mailto:bartremmer@gmail.com?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

    // Open the mailto link in a new tab
    window.open(mailtoLink);
});