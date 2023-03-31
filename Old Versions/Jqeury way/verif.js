var degree = 0,random;
random = Math.floor(Math.random() * (1080 - 720)) + 720;
/*function test(){
  if(random % degree == 0){
      setTimeout(function(){
        random = degree + (Math.floor(Math.random() * (1080 - 720)) + 720);
        console.log("fait");
      },3000)
  }else{
    setTimeout(function(){ 
      console.log("hello");
      $('img').css({'transform':'rotate('+degree+'deg)'});
      degree++;
    },0)
  }
}*/

/*$.keyframe.define([{
  name: 'myfirst',
  '0%':   {'transform':'rotate('+0+'deg)'},
  '100%': {'transform':'rotate('+degree+'deg)'}
}]);

      console.log("hello");
      $('#image').playKeyframe({
      name: 'myfirst', // name of the keyframe you want to bind to the selected element
      duration: "3s", // [optional, default: 0, in ms] how long you want it to last in     milliseconds
      timingFunction: 'linear', // [optional, default: ease] specifies the speed curve of the animation
      delay: 1000, //[optional, default: 0, in ms]  how long you want to wait before the animation starts in milliseconds, default value is 0
      repeat: 'infinite', //[optional, default:1]  how many times you want the animation to repeat, default value is 1
      //fillMode: 'running', //[optional, default: 'forward']  how to apply the styles outside the animation time, default value is forwards
      //complete: function(){} //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
    });
    random = (Math.floor(Math.random() * (1080 - 720)) + 720);
    degree = degree + random;*/
/*function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
setInterval(function(){
    console.log("hello");
    $('img').css({'transform':'rotate('+degree+'deg)'});
    degree++;
    if(random % degree == 0){
      console.log("won");
      sleep(15000);
      random = degree + (Math.floor(Math.random() * (1080 - 720)) + 720);
    }
},0)*/