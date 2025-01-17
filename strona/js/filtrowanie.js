document.addEventListener("DOMContentLoaded", function () {
    const filterForm = document.querySelector("#filterForm");

    if (filterForm) {
        filterForm.addEventListener("submit", function (e) {
            e.preventDefault(); // Zapobiegaj przeładowaniu strony

            const category = document.getElementById("kategoria").value;

            fetch(`index.php?idp=produkty&kategoria=${encodeURIComponent(category)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Błąd sieci!");
                    }
                    return response.text();
                })
                .then(data => {
                    // Podmień tylko tabelę produktów
                    const productsTable = document.querySelector("#productsTable");
                    if (productsTable) {
                        productsTable.innerHTML = data;
                    }
                })
                .catch(error => {
                    console.error("Błąd podczas filtrowania:", error);
                    alert("Wystąpił problem z filtrowaniem produktów.");
                });
        });
    }
});
