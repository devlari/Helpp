function modalLogin(modalID) {
  const modal = document.getElementById(modalID);
  if (modal) {
    modal.classList.add("mostrar");
    modal.addEventListener("click", (e) => {
      if (e.target.className == "botao") {
        modal.classList.remove("mostrar");
      }
    });
  }
}

function modalAtiv(modalID) {
  const modal = document.getElementById(modalID);
  const atividade = document.getElementById("atividade");
  if(modal) {
    atividade.addEventListener("click", (e) =>{
      modal.classList.add("mostrar");
      if(e.target.className == "botao") {
        modal.classList.remove("mostrar");
      }
    });
  }
}

function alteraLabel() {
  var input = document.getElementById("upload");
  input.addEventListener('change', () => {
    if(input.files.length > 0) 
    {
      var nome = "Não há arquivo selecionado. Selecionar arquivo...";
      nome = input.files[0].name;
      document.getElementById("label").innerHTML = nome;
    }
  });
}

const navSlide = () => {
  const burger = document.querySelector('.burguer');
  const nav = document.querySelector('.nav-links');
  burger.addEventListener("click", () => {
      nav.classList.toggle('nav-active');
      burger.classList.toggle('toggle');
    });
}
const app = () =>{
  navSlide();
  modalLogin("modal-aviso");
  modalAtiv("modal-atividade");
  alteraLabel();
}

app();