let turn = 0;
function miniprofile()
{
    if(turn==0)
    {
        let miniprofile = document.querySelector(".miniprofile");
        let profimg = document.querySelector(".profile img");
        
        miniprofile.classList.remove("invisible");
        profimg.classList.remove("profilemoveback");
        
        miniprofile.classList.add("visible");
        profimg.classList.add("profilemove");
        
        
        turn = 1;
    }
    else
    {
        let miniprofile = document.querySelector(".miniprofile");
        let profimg = document.querySelector(".profile img");
        
        miniprofile.classList.remove("visible");
        profimg.classList.remove("profilemove");
        
        miniprofile.classList.add("invisible");
        profimg.classList.add("profilemoveback");
        
        turn =0;
    }
}