
//declare variable for elements from the HTML document
let filmList;

function filterList(evnt)
{
  //get hold of the id number of the certificate that has been selected
  const id = evnt.target.value
  console.log("user clicked:"+id)
  //make an Ajax request to filterFilms.php
	fetch("filterFilms.php?id="+id).then(function(response) {
		return response.json();
	}).then(function(json) {
    //when we get some films back
    clearFilmList(); //clear the matching-films div element
    //loop over the films
    films.forEach(function(film){
      const newDiv = document.createElement("div"); //create a div
      newDiv.textContent = film.title; //set the content of the div to be the film title
      filmList.append(newDiv); //insert the new div into matching-films
  	});
	});
}

function clearFilmList()
{
  //as long as the matching-films div has a child element remove it.
  while(filmList.firstChild){
      filmList.removeChild(filmList.firstChild);
  }
}

function init(){
	filmList = document.querySelector("#matching-films"); //get hold of <div id="matching-films"></div>
  const certificateBtns = document.querySelectorAll(".certBtn"); //get hold of all the certificate radio buttons
  certificateBtns.forEach(function(btn){
    //selecting a radio button calls filterList
    btn.addEventListener("click",filterList,false)
  })
}

init()
