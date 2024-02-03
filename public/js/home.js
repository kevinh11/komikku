

const homePath = '../images/home/';
const imageFileNames = [];
let currIdx = 0;

// function animateHeroScreen() {
//   currIdx++;
//   if (currIdx > imageFileNames.length-1) {
//     currIdx = 0
//   }

//   const screen = document.querySelector('.hero-container');
// }

let currentTranslationValue = 0;

function slide(slider, dir) {
  const parent = slider.parentElement;
  const items = Array.from(parent.getElementsByTagName("a"));
  const itemsInDisplay = 3;
  const translationLimit = 100 * Math.ceil(items.length/itemsInDisplay); 

  console.log(translationLimit);
  currentTranslationValue += 100 * dir;

  // alert(currentTranslationValue);
  items.forEach((item)=> {
    if (currentTranslationValue > translationLimit) {
      currentTranslationValue = 0;
      item.style.transform = `translateX(0%)`;
    }
    else if (currentTranslationValue < 0) {
      currentTranslationValue = translationLimit;
    }
    
    else {
      item.style.transform = `translateX(${-1 * currentTranslationValue}%)`;
    }

  })

  console.log(parent)
}


const sliders = document.getElementsByClassName("slider-caret");

Array.from(sliders).forEach(s=> {
  
  if (s.classList.contains('left')) {
    s.addEventListener('click', ()=> {
      slide(s,-1)
    })
  }

  else {
    s.addEventListener('click', ()=> {
      slide(s,1)
    })
  }

})