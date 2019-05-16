let searchUrl = 'https://en.wikipedia.org/w/api.php?action=opensearch&format=json&search=';
let contentUrl = 'https://en.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&format=json&titles=';
let results = new Array(26).fill(0);
let total = "";
let x = window.innerWidth;
let y = window.innerHeight/2;
let oldX =  window.innerWidth;
let offset = 0;


let cnv;

let userInput;
let button;

let returned = false;
let waiting = false;
let counter = 0;
let counterRequest = 0;

let title = "";

function setup(){
  userInput = select('#userInput');

  button = select('#submit');

  oldX = x;
  let myDiv = select('#bigBox');
  x = myDiv.width;
  offset = (oldX-x)/2;

  cnv = createCanvas( x, y);
  background(200);
  cnv.position(offset,);

  text("Awaiting input", x/2 - 40, y/2);
  button.mousePressed(checkButton);
}


function draw(){;
  if (waiting) {
    clear();
    background(200);

    if(frameCount % 10 === 0){
      counter++;
      counterRequest++;
    }
    if (frameCount % 60 === 0) {
      counter = 0;
    }
    textSize(12);
    text("Waiting", x/2 - 35, y/2);
    for (var i = 1; i < counter+1; i++) {
      text(".", x/2 + i*4, y/2);
    }

    push();
    translate(-15,-5);
    stroke(96,211,148);
    strokeWeight(4);
    noFill();
    arc(x/2, y/2, 100, 100, 0, map(counter,0,100,0,360));
    pop();

    if (counterRequest > 20) {
      console.log("Request failed");
      waiting = false;
      couter = 0;
      counterRequest = 0;
      clear();
      background(200);
      text("Request failed,\nplease retry", x/2 - 40, y/2);
    }



  } else {
    counter = 0;
    if (returned) {
      drawFirst();
    }
  }

}


function windowResized() {
  document.location.reload(true);
}



function drawFirst(){
  clear();
  background(200);
  noStroke();
  for (var i = 0; i < results.length; i++) {
    fill(0);

    textSize(18);
    text(results[i], 0+i*x/results.length+x/results.length/2-(results[i].toString().length*8), 20);
    text(String.fromCharCode(97+i), 0+i*x/results.length+x/results.length/2-10, 40);
    textSize(10);
    pourcent = results[i]/total*100 + "";
    text((pourcent[1] == '.'?pourcent.substr(0,4):pourcent.substr(0,5)) + " %", 0+i*x/results.length+x/results.length/2-15, 60);
    rect(0+i*x/results.length, y/4,x/results.length-10,pourcent*10);
  }
}

function checkButton(){
  if(userInput.value().length < 1){
    console.log(userInput.value());
  } else {
    goWiki();
  }
}

function goWiki(){
  console.log("searching: " + userInput.value());
  counterRequest = 0;
  waiting = true;
  let term = userInput.value();
  let url = searchUrl + term;
  loadJSON(url, gotSearch, 'jsonp');
}

function gotSearch(data){
  let len = data[1].length;
  let index = floor(random(len));
  title = data[1][index];
  title = title.replace(/\s+/g, '_');
  console.log("Querying; " + title);
  counterRequest = 0;
  let url = contentUrl + title;
  loadJSON(url, gotContent, 'jsonp');
}

function gotContent(data){
  waiting = false;
  let page = data.query.pages
  let pageId = Object.keys(data.query.pages)[0];
  let content = page[pageId].revisions[0]['*'];
  content = content.toLowerCase();

  let regex = /\w+/g
  let words = content.match(regex);

  let vowelRegex = /[aeiou]/g
  let vowels = content.match(vowelRegex);

  let consonantRegex = /[b-df-hj-np-tv-xz]/g
  let consonants = content.match(consonantRegex);

  total = words.length;

  let totalBox = select('#titleBox');
  pourcentVowel = vowels.length/(vowels.length + consonants.length)*100 + "";
  pourcentConsonant = consonants.length/(vowels.length + consonants.length)*100 + "";
  totalBox.html("<br>Page: " + title +"<br>Number words: " + total + "<br>Ratio Vowels: " + pourcentVowel.substr(0,5) + "%, Consonants: " + pourcentConsonant.substr(0,5) + "% (" + vowels.length + " / " + consonants.length + ") for a total of " + (vowels.length + consonants.length) + " letters");

  //count each letter of first words
  for (var i = 0; i < words.length; i++) {
      results[words[i].charCodeAt(0) - 97]++;
  }

  returned = true;


}
