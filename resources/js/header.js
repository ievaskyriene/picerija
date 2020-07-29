/** @format */

function renderHeaderMenu(dataHMenu) {
  if (!Array.isArray(dataHMenu)) {
    return console.error("Reikia Array");
  }
  let HTML = "";
  for (let i = 0; i < dataHMenu.length; i++) {
    HTML += `<a href=${dataHMenu[i].ref} class = ${dataHMenu[i].class}>
           ${dataHMenu[i].text}</a>`;
  }

  let headerMenu = document.querySelector("nav");

  return (headerMenu.innerHTML = HTML);
}

renderHeaderMenu(navigation);

window.addEventListener("scroll", headerScroll);

window.addEventListener("scroll", () => {
  headerScroll();
  fixedHeader();
});

function headerScroll() {
  //einamoji scrolo vieta (aukstis)
  //susidarome sarasa
  let links = [];
  let DOMlinks = document.querySelectorAll(".header_menu > nav a");

  // console.log(DOMlinks);
  let headerHeight = document.querySelector(".header_menu").offsetHeight;

  let height = window.scrollY + headerHeight;
  for (let i = 0; i < DOMlinks.length; i++) {
    let link = DOMlinks[i];
    let href = link.href;
    let split = href.split("#");
    if (split.length > 1) {
      links.push("#" + split[1]);
    }
  }

  //randame aukscio pozicija
  let sectionHeigths = [];
  for (let i = 0; i < links.length; i++) {
    let link = links[i];
    if (link === "#") {
      sectionHeigths.push(0);
    } else {
      let section = document.querySelector(link);
      sectionHeigths.push(section.offsetTop);
    }
  }

  let wantedSection = 0;
  //nustatome kuri is dominanciu yra artimiausia mano esamai pozicijai
  for (let i = 0; i < sectionHeigths.length; i++) {
    let sectionH = sectionHeigths[i];

    if (sectionH <= height) {
      wantedSection = i;
    } else {
      break;
    }
  }
  //jeigu randame artimiausia dominancia
  //pries tia buvusi nuoroda header > nav netenka active klases
  //naujoji nuoroda
  document
    .querySelector(`.header_menu nav > a.active`)
    .classList.remove("active");
  document
    .querySelector(`.header_menu nav > a[href = "${links[wantedSection]}"]`)
    .classList.add("active");
  return;
}

function fixedHeader() {
  let firstHeader = document.querySelector(".header_menu");

  let minLogo = document.querySelector(".logo");
  // let headerActive = document.querySelector(`#main_header nav > a.ref.active`)

  if (window.scrollY > 200) {
    firstHeader.classList.add("fixedHeader");
    console.log(document.querySelector(".fixedHeader"));
    // minLogo.classList.add("logoMin");
    // let fixedHeaderinsert = document.querySelector("fixedHeader");
    // console.log(fixedHeaderinsert);
    // let minLogomin = document.querySelector("logoMin");
    document.querySelector(".fixedHeader");
    // .insertAdjacentHTML("afterbegin", " <img src='./img/logo.img'>");
  }

  if (window.scrollY <= 200) {
    firstHeader.classList.remove("fixedHeader");
    minLogo.classList.remove("logoMin");
    //headerActive.classList.remove('active');
    //firstHeader.classList.remove('logoMin');
  }
  return;
}
