var x = 680;
var y = 1120;
var z = 6.64;
//var z = 6.43;
var fruits = ['g', 'r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','y','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r','g','b','g','b','g','r','g','r','g','r'];
var hex = { "g": "#404040", "r": "#FF0000", "b": "#45B5DA",  "y": "#FFC870"};
var deg = Math.floor(Math.random() * (x-y)) + y;
var ca = $('#calc');
var wheel = $('.wheel');

function getRotationDegrees(obj) {
  var matrix = obj.css("transform");
  if(matrix !== 'none') {
      var values = matrix.split('(')[1].split(')')[0].split(',');
      var a = values[0];
      var b = values[1];
      var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
  } else { var angle = 0; }
  return (angle < 0) ? angle + 360 : angle;
}

function roulette(){
  anime({
    targets: '.wheel',
    rotate: {
      value: deg,
      duration: 9000,
      easing: 'easeInOutSine'
    },
    delay:3000,
    update: function(){
      var sup = getRotationDegrees(wheel);
      color = Math.floor(sup/z);
      des = hex[fruits[color]];
      $('i').css("color",des);
    },
    begin: function() {
      setTimeout(function(){ ca.css("opacity","0"); }, 3000);
    },
    complete: function() {
        deg%=360;
        rotation= "rotate("+deg+"deg)";
        wheel.css('transform',rotation);
        ca.css("color",des);
        deg+=Math.floor(Math.random() * (x-y)) + y;
        ca.text(15.00);
        ca.css("opacity","1");  
        work();
    },
    
  });
}




function work(){
  var i = 15.00;
  Interval = setInterval(function(){
    i-=0.01;
    total = i.toFixed(2);
    ca.text(total);
    if(total == 0.00){
      clearInterval(Interval);
      roulette();
    }
  },10);
}




work();


function twill(){
  anime({
    targets: '#test',
    width: test,
    easing: 'easeInOutSine'
  });

}
$('#insidetest').mousedown(function(e){
  test = e.pageX - $(this).offset().left;
  console.log('test');
  twill();
});
