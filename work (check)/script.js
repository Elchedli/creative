var x = 680;
var y = 1120;
var z = 6.64;
var fruits = ['g', 'r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','y','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r'];
var hex = { "g": "#404040", "r": "#FF0000", "b": "#45B5DA",  "y": "#FFC870"};
//var z = 6.43;
var deg = Math.floor(Math.random() * (x-y)) + y;
var ca = $('#calc');
function work(){
  var i = 15.00;
  Interval = setInterval(function(){
    i-=0.01;
    total = i.toFixed(2);
    ca.text(total);
    if(total == 0.00){
      clearInterval(Interval);
      anime({
        targets: '.wheel',
        rotate: {
          value: deg,
          duration: 9000,
          easing: 'easeInOutSine'
        },
        delay:3000,
        update: function(anim) {
          
        },
        begin: function() {
          setTimeout(function(){ ca.css("opacity","0"); }, 3000);
        },
        complete: function() {
            deg%=360;
            color = Math.floor(deg/z);
            des = hex[fruits[color]];
            $('i').css("color",des);
            ca.css("color",des);
            rotation= "rotate("+deg+"deg)";
            $('.wheel').css('transform',rotation);
            deg+=Math.floor(Math.random() * (x-y)) + y;
            ca.text(15.00);
            ca.css("opacity","1");  
            work();
        },
        
      });
    }
  },10);
    
    
}

work();
/*var fruits = ['g', 'r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','y','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r'];
var deg = 0;
var z = 6.64;
var ca = $('#calc');
function work(){
      anime({
        targets: '.wheel',
        rotate: {
          value: deg,
          duration: 1000,
          easing: 'easeInOutSine'
        },
        begin: function() {
        },
        complete: function() {
            deg%=360;
            color = Math.floor(deg/z);
            if(fruits[color] == "r"){
              $('i').css("color","red");
              ca.css("color","red");
            }else if(fruits[color] == "g"){
              $('i').css("color","gray");
              ca.css("color","gray");
            }else if(fruits[color] == "b"){
              $('i').css("color","blue");
              ca.css("color","blue");
            }
            //alert("rotation : "+deg+"  colornumber:"+color+"  color:"+fruits[color]);
            rotation= "rotate("+deg+"deg)";
            $('.wheel').css('transform',rotation);
            deg+=z;
            work();
        },
        
      });
    }

    work();*/



// 958 689
