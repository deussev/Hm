function validateForm() {
    var customerName = document.getElementById("customerName").value;
    var email = document.getElementById("email").value;
    var checkInDate = document.getElementById("checkInDate").value;
    var checkOutDate = document.getElementById("checkOutDate").value;
    var roomType = document.getElementById("roomType").value;

    // Simple validation (check if fields are not empty)
    if (customerName === "" || email === "" || checkInDate === "" || checkOutDate === "" || roomType === "") {
        alert("Please fill out all fields.");
        return false;
    }

    // Additional validation can be added (e.g., date comparison, email format)

    return true; // Form submission will proceed if validation passes
}
