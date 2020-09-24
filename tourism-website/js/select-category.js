var choice = document.querySelector('.btns');
var cardDeck = document.querySelector('#card-deck');

fetch('https://www.offrometour.com/wp-json/cards/v1/selectcard')
.then(response => response.json())
.then((data) => {
        for(var i = 0; i < data.length; i +=3){
            if(data[i].categories.includes('Paesi')){
                              cardDeck.innerHTML +=
               `<div class="col mb-4">
                <div class="card h-100">
                <a href="${data[i].permalink}" style="overflow: hidden;">
                <img src="${data[i].image}" class="card-img-top" alt="foto di ${data[i].title}">
               </a>
                <div class="card-body text-justify" style="border-top: 8px solid #6e32d2;">

                  <h4 class="card-title mt-0">${data[i].title}</h4>
				  <div class="post-categories">${data[i].tourCat}</div>
                  <p class="card-text">${data[i].excerpt}</p>
                  <a class="read-more" href="${data[i].permalink}">Leggi di più</a>
                  <div class="post-categories-not-tour">${data[i].otherCat}</div>
                </div>
              </div>
            </div>`;

            }
        }
    })

choice.addEventListener('click', (e)=>{
    cardDeck.innerHTML = '';
    fetch('https://www.offrometour.com/wp-json/cards/v1/selectcard')
    .then(response => response.json())
    .then((data) => {
        for(var i = 0; i < data.length; i +=6){
            if(data[i].categories.includes(e.target.innerHTML)){
              if(e.target.innerHTML !== 'Paesi'
              && e.target.innerHTML !== 'Villages'){
                cardDeck.innerHTML +=
                `<div class="col mb-4">
                 <div class="card h-100">
<a href="${data[i].permalink}" style="overflow: hidden;">
                 <img src="${data[i].image}" class="card-img-top" alt="foto di ${data[i].title}">
</a>
                 <div class="card-body text-justify">
                 <div class="d-flex flex-row align-items-center justify-content-between flex-wrap info">
					
                 <p><i class="far fa-calendar"></i>${data[i].giorno}</p>
                 <p><i class="far fa-clock"></i>${data[i].inizio}</p>
                 <p><i class="far fa-dot-circle"></i>${data[i].paese}</p>
                 
                 </div>
                   <h4 class="card-title">${data[i].title}</h4>
           <div class="post-categories">${data[i].tourCat}</div>
                   <p class="card-text">${data[i].excerpt}</p>
                   <a class="read-more" href="${data[i].permalink}">Leggi di più</a>
                   <div class="post-categories-not-tour">${data[i].otherCat}</div>
                 </div>
               </div>
             </div>`;

              } else {

                cardDeck.innerHTML +=
                `<div class="col mb-4">
                 <div class="card h-100">
<a href="${data[i].permalink}" style="overflow: hidden;">
                 <img src="${data[i].image}" class="card-img-top" alt="foto di 							${data[i].title}">
</a>
                 <div class="card-body text-justify" style="border-top: 8px solid 						#6e32d2;">
 
                   <h4 class="card-title mt-0">${data[i].title}</h4>
           <div class="post-categories">${data[i].tourCat}</div>
                   <p class="card-text">${data[i].excerpt}</p>
                   <a class="read-more" href="${data[i].permalink}">Leggi di più</a>
                   <div class="post-categories-not-tour">${data[i].otherCat}</div>
                 </div>
               </div>
             </div>`;

              }

            }
        }
    })
});