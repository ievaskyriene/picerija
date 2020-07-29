/** @format */

"use strict";
function renderProductMenu(dataHMenu) {
    if (!Array.isArray(dataHMenu)) {
        return console.error("Reikia Array");
    }
    let HTML = "";
    for (let i = 0; i < dataHMenu.length; i++) {
        HTML += `<div class="produktas">
      <img src='./img/${dataHMenu[i].img}'>
      <h3>${dataHMenu[i].h}</h3>
      <h4>${dataHMenu[i].text}</h4>
      <div class = "price_row">
        <h3>${dataHMenu[i].p}</h3>
        <button class="pasirinkti">Į krepšelį</button>
      </div>
    </div>`;
    }

    let headerMenu = document.querySelector(".pica_row");

    return (headerMenu.innerHTML = HTML);
}

renderProductMenu(picos);

function renderUzkandziai(dataHMenu) {
    if (!Array.isArray(dataHMenu)) {
        return console.error("Reikia Array");
    }
    let HTML = "";
    for (let i = 0; i < dataHMenu.length; i++) {
        HTML += `<div class="produktas">
      <img src='./img/${dataHMenu[i].img}'>
      <h3>${dataHMenu[i].h}</h3>
      <h4>${dataHMenu[i].text}</h4>
      <div class = "price_row">
        <h3>${dataHMenu[i].p}</h3>
        <button class="pasirinkti">Į krepšelį</button>
      </div>
    </div>`;
    }

    let headerMenu = document.querySelector(".uzkandziai_row");

    return (headerMenu.innerHTML = HTML);
}

renderUzkandziai(uzkandziai);

function renderDesertai(dataHMenu) {
    if (!Array.isArray(dataHMenu)) {
        return console.error("Reikia Array");
    }
    let HTML = "";
    for (let i = 0; i < dataHMenu.length; i++) {
        HTML += `<div class="produktas">
      <img src='./img/${dataHMenu[i].img}'>
      <h3>${dataHMenu[i].h}</h3>
      <h4>${dataHMenu[i].text}</h4>
      <div class = "price_row">
        <h3>${dataHMenu[i].p}</h3>
        <button class="pasirinkti">Į krepšelį</button>
      </div>
    </div>`;
    }

    let headerMenu = document.querySelector(".desertai_row");

    return (headerMenu.innerHTML = HTML);
}

renderDesertai(desertai);

function renderGerimai(dataHMenu) {
    if (!Array.isArray(dataHMenu)) {
        return console.error("Reikia Array");
    }
    let HTML = "";
    for (let i = 0; i < dataHMenu.length; i++) {
        HTML += `<div class="produktas">
      <img src='./img/${dataHMenu[i].img}'>
      <h3>${dataHMenu[i].h}</h3>
      <h4>${dataHMenu[i].text}</h4>
      <div class = "price_row">
        <h3>${dataHMenu[i].p}</h3>
        <button class="pasirinkti">Į krepšelį</button>
      </div>
    </div>`;
    }

    let headerMenu = document.querySelector(".gerimai_row");

    return (headerMenu.innerHTML = HTML);
}

renderGerimai(gerimai);
