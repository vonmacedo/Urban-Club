
// seleciona o elemento do seletor de cores
const colorPicker = document.getElementById('bola');

// adiciona um evento para atualizar a cor de fundo da imagem
colorPicker.addEventListener('change', (event) => {
  const selectedColor = event.target.value;
  const imageContainer = document.querySelector('.image-container-mod');
  const coloredBackground = document.querySelector('.imgmodog');
  
  // atualiza a cor de fundo da imagem
  coloredBackground.style.backgroundColor = selectedColor;
});