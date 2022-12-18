const openMenuMobileBtn = document.querySelector('.bar-mobile');
const barMenuMobile = document.querySelector('.bar_menu-mobile');
const closeBarMenuMobile = document.querySelector('.close_bar-mobile');
const barContainer = document.querySelector('.bar_container');
const body = document.body;
// 


// code customer
openMenuMobileBtn.addEventListener('click', function(){
    barMenuMobile.classList.add('open_bar-mobile');
    setTimeout(() => {
        
        barContainer.classList.add('open_bar_container')
    }, 100);
    body.classList.add('hidden_scroll');
});
closeBarMenuMobile.addEventListener('click', function()
{
    if( barContainer.classList.contains('open_bar_container'))
    {
        barContainer.classList.remove('open_bar_container')
    }
    barContainer.classList.remove('open_bar_container')

    if(barMenuMobile.classList.contains('open_bar-mobile'))
    {
        barMenuMobile.classList.remove('open_bar-mobile');
    }
    
    if(body.classList.contains('hidden_scroll'))
    {
        body.classList.remove('hidden_scroll');
    }

});
barMenuMobile.addEventListener('click',function(){
    if( barContainer.classList.contains('open_bar_container'))
    {
        barContainer.classList.remove('open_bar_container')
    }
    if(barMenuMobile.classList.contains('open_bar-mobile'))
    {
        barMenuMobile.classList.remove('open_bar-mobile');
    }
    if(body.classList.contains('hidden_scroll'))
    {
        body.classList.remove('hidden_scroll');
    }

    

})
barContainer.addEventListener('click', function(e){
     e.stopPropagation();
    
});

//  click icon sản phẩm moblie nav
document.querySelector('.menu_mobile-icon').addEventListener('click', function(e){
    document.querySelector('.menu_mobile_submenu').classList.toggle('open_bar-mobile');
    
});
// click 
// go to top

//Khi người dùng cuộn chuột thì gọi hàm scrollFunction
window.onscroll = function() {scrollFunction()};
// khai báo hàm scrollFunction
function scrollFunction() {
    // Kiểm tra vị trí hiện tại của con trỏ so với nội dung trang
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //nếu lớn hơn 20px thì hiện button
        document.getElementById("btn_gototop").style.display = "block";
    } else {
         //nếu nhỏ hơn 20px thì ẩn button
        document.getElementById("btn_gototop").style.display = "none";
    }
}
//gán sự kiện click cho button
document.getElementById('btn_gototop').addEventListener("click", function(){
    //Nếu button được click thì nhảy về đầu trang
    window.scrollTo({top: 0, behavior: 'smooth'});
});

// nhận dạng trình duyệt 
function BrowserDetect(){
                 
    var userAgent = navigator.userAgent;
    if(userAgent.match(/chrome|chromium|crios/i)){
      
      }
    else if(userAgent.match(/safari/i)){
      
        //  document.getElementById('fb-root').style.display = 'none';
    }
   
   
    
      
}
BrowserDetect()

    

