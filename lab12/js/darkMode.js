// Funkcja do odczytu wartości z ciasteczka
function getCookie(name) {
    var cookies = document.cookie.split('; ');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].split('=');
        if (cookie[0] === name) {
            return cookie[1];
        }
    }
    return null;
}

// Funkcja do ustawienia trybu ciemnego na podstawie ciasteczka
function initializeDarkMode() {
    var body = document.body;
    var darkModeValue = getCookie('darkMode');

    if (darkModeValue === 'enabled') {
        body.classList.add('dark-mode');
    } else {
        body.classList.remove('dark-mode');
    }
}

// Funkcja do przełączania trybu ciemnego
function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle('dark-mode');

    // Zapisz preferencję użytkownika w ciasteczku
    if (body.classList.contains('dark-mode')) {
        document.cookie = "darkMode=enabled; path=/; max-age=" + 60 * 60 * 24 * 30 + "; SameSite=Lax";  // 30 dni
    } else {
        document.cookie = "darkMode=disabled; path=/; max-age=" + 60 * 60 * 24 * 30 + "; SameSite=Lax";  // 30 dni
    }
}

// Inicjalizacja trybu ciemnego przy każdej zmianie strony
document.addEventListener('DOMContentLoaded', () => {
    initializeDarkMode();
});

// Ponowne zastosowanie trybu ciemnego, gdy zmienia się dynamiczna zawartość
document.addEventListener('pageLoaded', () => {
    initializeDarkMode();
});
