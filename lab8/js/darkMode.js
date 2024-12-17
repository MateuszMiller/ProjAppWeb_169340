function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle('dark-mode');  // Dodaje lub usuwa klasę 'dark-mode' z elementu body

    // Opcjonalnie, zapisz preferencję użytkownika w ciasteczku
    var isDarkMode = body.classList.contains('dark-mode');
    if (isDarkMode) {
        document.cookie = "darkMode=enabled; path=/; max-age=" + 60 * 60 * 24 * 30 + "; SameSite=Lax";  // 30 dni
    } else {
        document.cookie = "darkMode=disabled; path=/; max-age=" + 60 * 60 * 24 * 30 + "; SameSite=Lax";  // 30 dni
    }

    // Przeładowanie strony po zmianie trybu
    location.reload();
}
