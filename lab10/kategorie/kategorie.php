<h2>Zarządzanie kategoriami</h2>

<!-- Formularz dodawania kategorii -->
<form method="POST" action="">
    <label>Nazwa kategorii:</label>
    <input type="text" name="nazwa" required>
    <label>Matka (ID):</label>
    <input type="number" name="matka" value="0">
    <input type="submit" name="dodaj" value="Dodaj kategorię">
</form>

<!-- Formularz usuwania kategorii -->
<form method="POST" action="">
    <label>ID kategorii do usunięcia:</label>
    <input type="number" name="id_usun" required>
    <input type="submit" name="usun" value="Usuń kategorię">
</form>

<!-- Formularz edytowania kategorii -->
<form method="POST" action="">
    <label>ID kategorii do edycji:</label>
    <input type="number" name="id_edytuj" required>
    <label>Nowa nazwa:</label>
    <input type="text" name="nowa_nazwa" required>
    <input type="submit" name="edytuj" value="Edytuj kategorię">
</form>