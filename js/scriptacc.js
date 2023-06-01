
// seleciona o elemento do seletor de cores
const colorPicker = document.getElementById('bola');
const imagemPrincipal = document.querySelector('.imgmodog');
const popUp = document.querySelector('#pop-up');
const imagensPopup = document.querySelectorAll('.imagem-popup');
// adiciona um evento para atualizar a cor de fundo da imagem
colorPicker.addEventListener('change', (event) => {
  const selectedColor = event.target.value;
  const coloredBackground = document.querySelector('.imgmodog');
  coloredBackground.style.backgroundColor = selectedColor;
});
  // atualiza a cor de fundo da imagem
  const changeColorButton = document.querySelector('#changeColorButton');
  const imageBackground = document.querySelector('#imageBackground');
  imagemPrincipal.addEventListener('click', () => {
    popUp.classList.remove('hidden');
  });
  imagensPopup.forEach(imagemPopup => {
    imagemPopup.addEventListener('click', () => {
      const novaImagem = imagemPopup.getAttribute('src');
      imagemPrincipal.setAttribute('src', novaImagem);
      popUp.classList.add('hidden');
    });
  });
  changeColorButton.addEventListener('click', () => {
    const selectedColor = colorPicker.value;
    imageBackground.style.backgroundColor = selectedColor;
    imageBackground.src = imagemPrincipal.src;
  });

