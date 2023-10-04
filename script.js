// script.js
document.addEventListener("DOMContentLoaded", function () {
    const loadingContainer = document.querySelector("loading-container"); // Changed to use querySelector with class
    const generateButton1 = document.getElementById("generate-button1");

    generateButton1.addEventListener("click", function (event) {
        event.preventDefault();

        loadingContainer.style.display = "flex";

        // You can directly get the budget_id from the button's data attribute
        const budgetId = this.getAttribute("data-budget-id");

        console.log("Button clicked. Budget ID:", budgetId);

        // Redirect to quotation1.php with the budget_id parameter after a delay
        setTimeout(function () {
            window.location.href = `quotation1.php?budget_id=${budgetId}`;
        }, 6000); // Adjust the delay as needed (6 seconds in this example)
    });
});
