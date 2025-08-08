// Mostrar a senha
let checkboxAlternar = document.getElementById("alternar");
checkboxAlternar.checked = false; // Mudando o estado dela pq começa com true

checkboxAlternar.addEventListener("change", () => {
    document.getElementById("senha").type = checkboxAlternar.checked ? "text" : "password";
});