document.addEventListener("DOMContentLoaded", function () {
    const seatContainer = document.getElementById("seat-container");
    const seatForm = document.getElementById("seatForm");
    const selectedSeatsInput = document.getElementById("selectedSeatsInput");

    seatContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("seat") && !event.target.classList.contains("occupied")) {
            // Toggle class 'selected' to change color to green
            event.target.classList.toggle("selected");

            // Retrieve and display selected seats
            const selectedSeats = document.querySelectorAll(".seat.selected");
            const selectedSeatNumbers = Array.from(selectedSeats).map(seat => seat.dataset.seat);
            console.log("Selected Seats:", selectedSeatNumbers);

            // Update hidden input with selected seat numbers
            selectedSeatsInput.value = selectedSeatNumbers.join(",");
        }
    });

    seatForm.addEventListener("submit", function (event) {
        // Prevent the form from submitting in the default way
        event.preventDefault();

        // You can add additional logic here before submitting the form
        seatForm.submit();
    });
});
