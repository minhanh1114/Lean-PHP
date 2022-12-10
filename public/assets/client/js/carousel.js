


var slider = document.getElementById('slider'),
    sliderItems = document.getElementById('slides'),
    prev = document.getElementById('prev'),
    next = document.getElementById('next');
    let slideSize=0;
    var interval_slide_one;

function slide(wrapper, items, prev, next) {
  var posX1 = 0,
      posX2 = 0,
      posInitial,
      posFinal,
      threshold = 100,
      slides = items.getElementsByClassName('slide'),
      slidesLength = slides.length,
      firstSlide = slides[0],
      lastSlide = slides[slidesLength - 1],
      cloneFirst = firstSlide.cloneNode(true),
      cloneLast = lastSlide.cloneNode(true),
      index = 0,
      allowShift = true;

      slideSize = items.getElementsByClassName('slide')[items.getElementsByClassName('slide').length-1].offsetWidth;
console.log('slide 1',slideSize);
  // Clone first and last slide
  items.appendChild(cloneFirst);
  items.insertBefore(cloneLast, firstSlide);
  wrapper.classList.add('loaded');
  
  // Mouse events
  items.onmousedown = dragStart;
  
  // Touch events
  items.addEventListener('touchstart', dragStart);
  items.addEventListener('touchend', dragEnd);
  items.addEventListener('touchmove', dragAction);
  
  // Click events
  prev.addEventListener('click', function () { shiftSlide(-1) });
  next.addEventListener('click', function () { shiftSlide(1) });
  // 
  interval_slide_one = setInterval(() => {
    posInitial = items.offsetLeft;
     items.classList.add('shifting');
     items.style.left = (posInitial - slideSize) + "px";
     index++;      
     
   }, 8000);
   window.addEventListener('blur', (e) => {
    console.log('leave tab');
    clearInterval(interval_slide_one);

  });
  
  // Transition events
  items.addEventListener('transitionend', checkIndex);
  
  function dragStart (e) {
    e = e || window.event;
    e.preventDefault();
    posInitial = items.offsetLeft;
    
    if (e.type == 'touchstart') {
      posX1 = e.touches[0].clientX;
    } else {
      posX1 = e.clientX;
      document.onmouseup = dragEnd;
      document.onmousemove = dragAction;
    }
  }

  function dragAction (e) {
    e = e || window.event;
    
    if (e.type == 'touchmove') {
      posX2 = posX1 - e.touches[0].clientX;
      posX1 = e.touches[0].clientX;
    } else {
      posX2 = posX1 - e.clientX;
      posX1 = e.clientX;
    }
    items.style.left = (items.offsetLeft - posX2) + "px";
  }
  
  function dragEnd (e) {
    clearInterval(interval_slide_one);
    posFinal = items.offsetLeft;
    if (posFinal - posInitial < -threshold) {
      shiftSlide(1, 'drag');
    } else if (posFinal - posInitial > threshold) {
      shiftSlide(-1, 'drag');
    } else {
      items.style.left = (posInitial) + "px";
    }

    document.onmouseup = null;
    document.onmousemove = null;
  }
  
  function shiftSlide(dir, action) {

    clearInterval(interval_slide_one);

    items.classList.add('shifting');
    
    if (allowShift) {
      if (!action) {
        posInitial = items.offsetLeft; }
        console.log(posInitial);

      if (dir == 1) {
        items.style.left = (posInitial - slideSize) + "px";
        index++;      
      } else if (dir == -1) {
        items.style.left = (posInitial + slideSize) + "px";
        index--;      
      }
      // console.log(slideSize);
    };
    
    allowShift = false;
  }
    
  function checkIndex (){
    items.classList.remove('shifting');

    if (index == -1) {
      items.style.left = -(slidesLength * slideSize) + "px";
      index = slidesLength - 1;
    }

    if (index == slidesLength) {
      items.style.left = -(1 * slideSize) + "px";
      index = 0;
    }
    
    allowShift = true;
  }

  
}

// console.log('chiều rộng của phần tử slider-content',document.getElementsByClassName('slider-content')[0].offsetWidth);



// load event khi dom load xong
document.addEventListener("DOMContentLoaded", function(){

  const slides_children = document.getElementsByClassName('slide');
  let slide_width = document.getElementsByClassName('slider-content')[0].offsetWidth;
  // console.log(slides_children.length);

  for (let i = 0; i < slides_children.length; i++)  {
    slides_children[i].style.maxWidth = slide_width + 'px';
    slider.style.height = slide_width /1.995 + 'px';
  };
  


  window.addEventListener('resize', function(event) {
    clearInterval(interval_slide_one);
    setTimeout(() => {
        slide_width = document.getElementsByClassName('slider-content')[0].offsetWidth;
        slideSize = slide_width;
        for (let i = 0; i < slides_children.length; i++)  {
          slides_children[i].style.maxWidth = slide_width + 'px';
          slider.style.height = slide_width /1.995 + 'px';
        };
    }, 500);
    document.addEventListener("visibilitychange", (event) => {
      if (document.visibilityState == "visible") {
        console.log("tab is active")
      } else {
        console.log("tab is inactive")
      }
    });

    
    
  });
  setTimeout(() => {
    slide(slider, sliderItems, prev, next);

   
  }, 1500);

 

});


//  event thay đổi cửa sổ trình duyệt

/// slider two
// 
// 









const btnSliderTwoPrev = document.querySelector('.slider-two_left')
const btnSliderTwoNext = document.querySelector('.slider-two_right')

const wrapper = document.querySelector('.cards-wrapper');

// console.log(wrapper.clientWidth);

// grab the dots
const dots = document.querySelectorAll('.slide-two .dot');
// the default active dot num which is array[0]
let activeDotNum = 0;

dots.forEach((dot, idx) => {  
//   number each dot according to array index
  dot.setAttribute('data-num', idx);
  
//   add a click event listener to each dot
  dot.addEventListener('click', (e) => {
    
    let clickedDotNum = e.target.dataset.num;
    // console.log(clickedDotNum);
//     if the dot clicked is already active, then do nothing
    if(clickedDotNum == activeDotNum) {
      // console.log('active');
      return;
    }
    else {
      // console.log('not active');
      // shift the wrapper
      let displayArea = wrapper.parentElement.clientWidth;
      // let pixels = -wrapper.clientWidth * clickedDotNum;
      let pixels = -displayArea * clickedDotNum
      wrapper.style.transform = 'translateX('+ pixels + 'px)';
//       remove the active class from the active dot
      dots[activeDotNum].classList.remove('active');
//       add the active class to the clicked dot
      dots[clickedDotNum].classList.add('active');
//       now set the active dot number to the clicked dot;
      activeDotNum = clickedDotNum;
    }
    
  });
  
});
btnSliderTwoNext.addEventListener('click',()=>{
  if(activeDotNum>=dots.length-1)
  {
    activeDotNum=-1;
  }
  let count=activeDotNum;
  count++;
  activeDotNum = count;
  // if()
  dots.forEach((item)=>{
    if(item.classList.contains('active'))
    {
      item.classList.remove('active');
    }
    

  })
  let displayArea = wrapper.parentElement.clientWidth * count;
  wrapper.style.transform = 'translateX(-'+ displayArea + 'px)';
  dots[count].classList.add('active');
})

btnSliderTwoPrev.addEventListener('click',()=>{
 
  
  if(activeDotNum===0)
  {
    activeDotNum=dots.length;
  }
  let count=activeDotNum;
  count--;
  activeDotNum = count;
  // if()
  dots.forEach((item)=>{
    if(item.classList.contains('active'))
    {
      item.classList.remove('active');
    }
    

  })
  let displayArea = wrapper.parentElement.clientWidth * count;
 
  wrapper.style.transform = 'translateX(-'+ displayArea + 'px)';
  dots[count].classList.add('active');
})
setInterval(() => {
  // btnSliderTwoNext.click();
},5000);

// drag the slider

let isDown = false;
let startX;
let scrollLeft;
const slider_two = document.querySelector('.display-area');

const end = () => {
	isDown = false;
  slider_two.classList.remove('active');
}

const start = (e) => {
  isDown = true;
  slider_two.classList.add('active');
  startX = e.pageX || e.touches[0].pageX - slider_two.offsetLeft;
  scrollLeft = slider_two.scrollLeft;	
}

const move = (e) => {
	if(!isDown) return;

  e.preventDefault();
  const x = e.pageX || e.touches[0].pageX - slider_two.offsetLeft;
  const dist = (x - startX);
  slider_two.scrollLeft = scrollLeft - dist;
}

(() => {
	slider_two.addEventListener('mousedown', start);
	slider_two.addEventListener('touchstart', start);

	slider_two.addEventListener('mousemove', move);
	slider_two.addEventListener('touchmove', move);

	slider_two.addEventListener('mouseleave', end);
	slider_two.addEventListener('mouseup', end);
	slider_two.addEventListener('touchend', end);
})();

