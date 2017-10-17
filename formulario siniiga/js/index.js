//---#1---
function sort() {
  var inputs = document.getElementsByClassName( 'inputTask1' );
  var names  = [].map.call(inputs, function( input ) {
    return input.value;
  });
  var inp = document.getElementsByName('radioTask1');
    for (var i = 0; i < inp.length; i++) {
      if (inp[i].checked && inp[i].id == "NmbA") {
        names.sort(function(a, b){return a-b});
      } else if (inp[i].checked && inp[i].id == "NmbD") {
        names.sort(function(a, b){return b-a});
      } else if (inp[i].checked && inp[i].id == "AlbA") {
        names.sort();
      } else if (inp[i].checked && inp[i].id == "AlbD") {
        names.sort();
        names.reverse();
      }
  }
  document.getElementById("resultsexo").innerHTML = "Sort: " + names;
    
    
    var inp = document.getElementsByName('sexo');
    for (var i = 0; i < inp.length; i++) {
      if (inp[i].checked && inp[i].id == "hembra") {
        names.sort(function(a, b){return a-b});
      } else if (inp[i].checked && inp[i].id == "macho") {
        names.sort(function(a, b){return b-a});
      } 
        names.reverse();
      }
  }
  document.getElementById("resultsexo").innerHTML = "Sort: " + names;
};
//---#2---
function countdown(n) {
  if (n > -1) {
    alert (n);
    return countdown(n - 1);
  } else {
    return n;
  }
};
//---#3---
function getRandomColor() {
  var letters = '0123456789ABCDEF';
    var color = '#';
  for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
  document.getElementById("test").style.backgroundColor = color;
  var randomColor = document.getElementById("task3");
  randomColor.innerHTML = "The color is: " + color;
  return color; 
};
//------