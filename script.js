
const carMoveRight = document.getElementById( "carousel-move-right" )
const carMoveLeft  = document.getElementById( "carousel-move-left" )
const carousel = document.getElementById( "carousel" )

var movingInterval
let intervalLength = 10
var moveAmount     = 10


carMoveRight.addEventListener( "mousedown", function()
{
	movingInterval = setInterval( () => { moveCarouselRight( moveAmount ) }, intervalLength )
})
carMoveLeft.addEventListener( "mousedown", function()
{
	movingInterval = setInterval( () => { moveCarouselRight( -moveAmount ) }, intervalLength )
})



for ( let btn of [ carMoveRight, carMoveLeft ] )
{
  btn.addEventListener( "mouseup", () => {
    clearInterval( movingInterval )
  })
  btn.addEventListener( "mouseout", () => {
    clearInterval( movingInterval )
  })
}


function moveCarouselRight( amount )
{
    carousel.scrollTo({ left: carousel.scrollLeft + amount, behavior: "auto" })
}