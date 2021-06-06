

/*MobileSliderMain-start*/

$( document ).ready(function() {
    let items=$('.slider__item');
    items[0].style.display='flex';
    let sliderTimer=0;
    let maxSliderTimer=items.length-1;
    let minSliderTimer=0;
    $('.slider__control_next').click(function (){
        if(sliderTimer!=maxSliderTimer){
            sliderTimer++;
            resetSliderItems(sliderTimer);
            items[sliderTimer].style.display='flex';
        }else{
            sliderTimer=minSliderTimer;
            resetSliderItems(sliderTimer);
            items[sliderTimer].style.display='flex';
        }
    });
    $('.slider__control_prev').click(function (){
        if(sliderTimer!=minSliderTimer){
            sliderTimer--;
            resetSliderItems(sliderTimer);
            items[sliderTimer].style.display='flex';
        }else{
            sliderTimer=maxSliderTimer;
            resetSliderItems(sliderTimer);
            items[sliderTimer].style.display='flex';
        }
    });

    function resetSliderItems(sliderTimer){
        for (let i=0;i<items.length;i++){
            if(i!=sliderTimer){
                items[i].style.display='none';
            }
        }
    }
});

/*MobileSliderMain-end*/
