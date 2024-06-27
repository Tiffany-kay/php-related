function validateForm() {
    let name = document.getElementById('name').Value;
    let email = document.getElementById('email').value;
    let feedback = document.getElementById('feedback').value;
    let rating = document.getlementById('rating').value;
    let submission_date = document.getlementById('submission_date').Value;

    if (name == "" || email == "" || feedback == "" || rating == "" || submission_date == "") {
        alert("Please fill all the fields");
        return false;

    }

    let emailPattern = /^[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/;
    if(!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;

    }
    if (rating < 1 || rating > 5) {
        alert("Please enter a valid rating between 1 and 5");
        return false;

    }

}