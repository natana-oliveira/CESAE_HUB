// Declarar cada constante. Cada constante representa um elemento do documento HTML identificado pelo seletor CSS correspondente.
const openModalButton = document.querySelector("#open-modal");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");
// document.querySelector() é um método que retorna o primeiro elemento dentro do documento que corresponde ao seletor especificado.

// Definir função toggleModal. O forEach itera um array [modal, fade].
// Para cada elemento do array (el), a função classList.toggle() é chamada com o argumento "hide". Isso alternará a presença da classe hide nos elementos do modal e do fade, fazendo com que eles apareçam ou desapareçam.
const toggleModal = () => {
    [modal, fade].forEach((el) => el.classList.toggle("hide"));
};

// Adicionar event listeners para os elementos openModalButton, closeModalButton e fade.
// O método forEach itera o array contendo esses elementos.
// Chama addEventListener() para escutar o evento de clique ("click") para cada elemento (el) do array.
// Quando esse evento ocorre, a função toggleModal é chamada. Assim, clicar em qualquer um desses elementos executará a função toggleModal, alternando a visibilidade do modal e do fade.
[openModalButton, closeModalButton, fade].forEach((el) => {
    el.addEventListener("click", () => toggleModal());
});
