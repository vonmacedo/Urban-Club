
var markers = [
  {
    idLugar:1,
    position: { lat: -23.9616758, lng: -46.3167502 },
    title: "Praça Palmares",
    type: "skate",
    photoUrl: "./img/praça-plamares.png",
    tempo: "Todos os dias 24 horas.",
    icpv: "Publico."
  },
  {
    idLugar:2,
    position: { lat: -23.968807732192566, lng: -46.35150499213918 },
    title: "Pista Quebra Mar",
    type: "skate",
    photoUrl: "./img/skate-quebra-mar.jpg",
    tempo: "Todos os dias 8H as 22H.",
    icpv: "Publico."
  },
  {
    idLugar:3,
    position: { lat: -23.947473172399416, lng: -46.3538606979173 },
    title: "Lagoa Skate Plaza",
    type: "skate",
    photoUrl: "./img/lagoa.png",
    tempo: "Todos os dias 8H AS 22H.",
    icpv: "Publico."
  },
  {
    idLugar:4,

    position: { lat: -23.968618795130748, lng: -46.35038078657946 },
    title: "Quadra Quebra-Mar",
    type: "basquete",
    photoUrl: "./img/bas-quebra-mar.jpeg",
    tempo: "Todos os dias 8H as 22H.",
    icpv: "Publico."
  },
  {
    idLugar:5,

    position: { lat: -23.978323795344334, lng: -46.30096832729573 },
    title: "Quadra Abor",
    type: "basquete",
    photoUrl: "./img/abor-quadra-bas.jpg",
    tempo: "Segunda a sexta (8H AS 19H).",
    icpv: "Publico."
  },
  {
    idLugar:6,

    position: { lat: -23.93471937248423, lng: -46.321169032077776 },
    title: "Ginásio SDAS",
    type: "basquete",
    photoUrl: "./img/bas-ginasio-sdas.jpg",
    tempo: "Segunda a sexta (14H AS 22H).",
    icpv: "Privado."
    
  }
];
var imagensFavoritos = {
  1: './img/praça-plamares.png',
  2: './img/skate-quebra-mar.jpg',
  3: './img/lagoa.png',
  4: './img/bas-quebra-mar.jpeg',
  5: './img/abor-quadra-bas.jpg',
  6: './img/bas-ginasio-sdas.jpg',
};
const imagens = document.querySelectorAll('.favorito img');

        // Percorre todas as imagens
        imagens.forEach(function(imagem) {
            // Obtém o id do lugar da imagem do atributo "data-id-lugar"
            const idLugarImagem = parseInt(imagem.getAttribute('data-id-lugar'));

            // Verifica se o idLugar atual é igual ao idLugar da imagem favorita
            if (idLugarImagem in imagensFavoritos) {
                // Obtém o caminho da imagem do objeto imagensFavoritos
                const caminhoImagem = imagensFavoritos[idLugarImagem];

                // Define o caminho da imagem como o src da tag <img>
                imagem.setAttribute('src', caminhoImagem);
            }
        });