let container = document.querySelector("#container");
let dino = document.querySelector("#dino");
let block = document.querySelector("#block");
let road = document.querySelector("#road");
let cloud = document.querySelector("#cloud");
let score = document.querySelector("#score");
let gameOver = document.querySelector("#gameOver");
let gameStart = document.querySelector("#start");
let myDialog = document.querySelector("#exampleModal");

//declaring variable for score
let interval = null;
let playerScore = 0;


//function for score
let scoreCounter = () => {
    playerScore++;
    score.innerHTML = `Score <b>${playerScore}</b>`;
}


//start Game
window.addEventListener("keydown", (start) => {
    //    console.log(start);
        if (start.keyCode == 13) {
            gameOver.style.display = "none";
            gameStart.style.display = "none";
            block.classList.add("blockActive");
            road.firstElementChild.style.animation = "roadAnimate 1.5s linear infinite";
            cloud.firstElementChild.style.animation = "cloudAnimate 50s linear infinite";
            //score
            let playerScore = 0;
            interval = setInterval(scoreCounter,200);

        }
});


//jump Your Character
window.addEventListener("keydown", (e) => {
    //    console.log(e); 
    //    keyCode == 32為space
    if (e.keyCode == 32)
        if (dino.classList != "dinoActive") {
            dino.classList.add("dinoActive");

            //                remove class after 0.5 seconds
            setTimeout(() => {
                dino.classList.remove("dinoActive");
            }, 500);
        }
});

//'Game Over' if 'Character' hit The 'Block' 
let result = setInterval(() => {
    let dinoBottom = parseInt(getComputedStyle(dino).getPropertyValue("bottom"));
    //    console.log("dinoBottom" + dinoBottom);

    let blockLeft = parseInt(getComputedStyle(block).getPropertyValue("left"));
    //    console.log("BlockLeft" + blockLeft);
    if (dinoBottom <= 210 && blockLeft >= 20 && blockLeft <= 50) {
        //        console.log("Game Over");
        gameOver.style.display = "block";
        block.classList.remove("blockActive");
        road.firstElementChild.style.animation = "none";
        cloud.firstElementChild.style.animation = "none";
        clearInterval(interval);

        var url = "/final/models/score.php";
        $.ajax({
            type: "POST",
            url: url,
            data:{game_score:playerScore},
            success: function(data){//後台返回給前台的值

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.status);
            alert(XMLHttpRequest.readyState);
            alert(textStatus);
            },})

        var url = "/final/models/score_rank.php";
        $.ajax({
            type: "POST",
            url: url,
            data:{game_score:playerScore},
            success: function(data){//後台返回給前台的值
                document.querySelector("#modal-body").innerHTML=data;
                $('#exampleModalCenter').modal('show')       
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.status);
            alert(XMLHttpRequest.readyState);
            alert(textStatus);
            },})
        playerScore = 0;
    }
    
}, 10);

