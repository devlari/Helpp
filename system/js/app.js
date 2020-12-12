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

function modalAlert(modalID) {
  const modal = document.getElementById(modalID);
  var input = document.getElementById("uploadPPs");
  if (modal) {
    input.addEventListener("change", () => {
      modal.classList.add("mostrar");
      nome = input.files[0].name;
      document.getElementById("spnAviso").innerHTML =
        "Tem certeza que deseja enviar o arquivo " + nome + "?";
      modal.addEventListener("click", (e) => {
        if (e.target.className == "botao") {
          input.value = "";
          modal.classList.remove("mostrar");
        }
      });
    });
  }
}

function modalAtiv(modalID) {
  const modal = document.getElementById(modalID);
  const atividade = document.querySelectorAll(".ativ.atribuidaa");
  if (modal) {
    atividade.forEach(linha => linha.addEventListener("click", (e) => {
      modal.classList.add("mostrar");
      modal.addEventListener("click", (e) => {
        if (e.target.className == "botao") {
          location.reload()
        }
      });
    }))
    // atividade.addEventListener("click", (e) => {
    //   modal.classList.add("mostrar");
    //   modal.addEventListener("click", (e) => {
    //     if (e.target.className == "botao") {
    //       location.reload()
    //     }
    //   });
    // });
  }
}

function modalDocAluno(modalID) {
  const modal = document.getElementById(modalID);
  const tabela = document.getElementById("tabelaProfsPP");
  if (modal) {
    tabela.addEventListener("click", (e) => {
      if (e.target.className == "celulaNomeAluno") {
        modal.classList.add("mostrar");
        modal.addEventListener("click", (e) => {
          if (e.target.className == "botao-fechar" || e.target == modal) {
            location.reload()
          }
        });
      }
    });
  }
}

function modalAtivAluno(modalID) {
  const modal = document.getElementById(modalID);
  const tabela = document.getElementById("tabelaAtividade");
  const tabelaAtiv = document.querySelectorAll("#linhaAtiv")
  if (modal) {
    tabelaAtiv.forEach(linha => linha.addEventListener('click', (e) => {
      let Status = linha.lastElementChild
      if (e.target.className == "nomeAluno") {
        if (Status.innerText == "Entregue") {
          modal.classList.add("mostrar");
          modal.addEventListener("click", (e) => {
            if (e.target.className == "botao-fechar" || e.target == modal) {
              location.reload()
            }
          });
        }
      }
    }))
    /*tabela.addEventListener("click", (e) => {
      if (e.target.className == "nomeAluno") {
        modal.classList.add("mostrar");
        modal.addEventListener("click", (e) => {
          if (e.target.className == "botao-fechar" || e.target == modal) {
            location.reload()
          }
        });
      }
    });*/
  }
}

function alteraLabel() {
  var input = document.getElementById("upload");
  if (input) {
    input.addEventListener("change", () => {
      if (input.files.length > 0) {
        var nome = "Não há arquivo selecionado. Selecionar arquivo...";
        nome = input.files[0].name;
        document.getElementById("label").innerHTML = nome;
      }
    });
  }
}

window.onscroll = scroll;

function scroll() {
  var scrollTop = window.pageYOffset;
  if (scrollTop > 30) {
    try {
      document.getElementById("navbar-helpp").id = "depois";
    } catch (e) {
      false;
    }
  } else {
    try {
      document.getElementById("depois").id = "navbar-helpp";
    } catch (e) {
      false;
    }
  }
}
const softScroll = () => {
  const menuItems = document.querySelectorAll('.nav-links li a[href^="#"]')
  menuItems.forEach(item => {
    item.addEventListener("click", scrollToIdOnClick)
  })

  function scrollToIdOnClick(event) {
    event.preventDefault()
    const element = event.target
    const id = element.getAttribute('href')
    const to = document.querySelector(id).offsetTop - 100;
    // console.log(to)
    // window.scrollTo({
    //   top: to - 100,
    //   behavior: 'smooth',
    // })
    smoothScrollTo(0, to)
  }
  function smoothScrollTo(endX, endY, duration) {
    const startX = window.scrollX || window.pageXOffset;
    const startY = window.scrollY || window.pageYOffset;
    const distanceX = endX - startX;
    const distanceY = endY - startY;
    const startTime = new Date().getTime();

    duration = typeof duration !== 'undefined' ? duration : 400;

    // Easing function
    const easeInOutQuart = (time, from, distance, duration) => {
      if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
      return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
    };

    const timer = setInterval(() => {
      const time = new Date().getTime() - startTime;
      const newX = easeInOutQuart(time, startX, distanceX, duration);
      const newY = easeInOutQuart(time, startY, distanceY, duration);
      if (time >= duration) {
        clearInterval(timer);
      }
      window.scrollTo(newX, newY);
    }, 1000 / 60); // 60 fps
  };
}
const navSlide = () => {
  const burger = document.querySelector(".burguer");
  const nav = document.querySelector(".nav-links");
  const tela = document.getElementById("tela");
  const tela2 = document.getElementById("tela2");
  const rodape = document.getElementById("rodape");
  if (nav) {
    burger.addEventListener("click", () => {
      nav.classList.add("nav-active");
      tela.addEventListener("click", (e) => {
        if (e.target !== nav) {
          nav.classList.remove("nav-active");
        }
      });
      tela2.addEventListener("click", (e) => {
        if (e.target !== nav) {
          nav.classList.remove("nav-active");
        }
      });
      rodape.addEventListener("click", (e) => {
        if (e.target !== nav) {
          nav.classList.remove("nav-active");
        }
      });
    });
  }
};

function CriaRequest() {
  try {
    request = new XMLHttpRequest();
  } catch (IEAtual) {

    try {
      request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (IEAntigo) {

      try {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (falha) {
        request = false;
      }
    }
  }
  if (!request)
    alert("Seu Navegador não suporta Ajax!");
  else
    return request;
}

function getDados() {
  // Declaração de Variáveis
  const tabelaAtivRecebida = document.querySelectorAll("#linhaAtiv")
  const tabelaPP = document.querySelectorAll("#linhaPP")
  const tabelaAtividadesAluno = document.querySelectorAll('.atribuida .ativ.atribuidaa')
  if (tabelaAtividadesAluno) {
    tabelaAtividadesAluno.forEach(linha => linha.addEventListener('click', (e) => {
      let codAtiv = linha.childNodes[0].defaultValue;
      if(codAtiv){
      let RM = document.getElementById('rmAlunoAtual')
      let result = document.getElementById("modal-ativ-aluno")
      let xmlreq = CriaRequest()
      xmlreq.open("GET", "../../../application/teste.php?txtRm=" + RM + "&txtCodAtiv=" + codAtiv + "&funcao=modalAtivAluno", true)
      xmlreq.onreadystatechange = function () {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

          // Verifica se o arquivo foi encontrado com sucesso
          if (xmlreq.status == 200) {
            result.innerHTML += xmlreq.responseText;//pega a resposta que foi impressa no php
          } else {
            result.innerHTML = "Erro: " + xmlreq.statusText;
          }
        }
      }
      xmlreq.send(null);
    }
    }))
  }
  tabelaPP.forEach(linha => linha.addEventListener('click', (e) => {
    if (e.target.className == 'celulaNomeAluno') {
      let RM = linha.firstElementChild.innerText
      let result = document.getElementById("basesTec")
      let xmlreq = CriaRequest()
      xmlreq.open("GET", "../../../application/teste.php?txtRm=" + RM + "&funcao=modalPp", true);

      xmlreq.onreadystatechange = function () {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

          // Verifica se o arquivo foi encontrado com sucesso
          if (xmlreq.status == 200) {
            result.innerHTML += xmlreq.responseText;//pega a resposta que foi impressa no php
          } else {
            result.innerHTML = "Erro: " + xmlreq.statusText;
          }
        }
      }
      xmlreq.send(null);
    }
    //console.log(linha.firstElementChild.innerText)
  }))
  tabelaAtivRecebida.forEach(linha => linha.addEventListener('click', (e) => {
    let Status = linha.lastElementChild.innerText;
    if (e.target.className == 'nomeAluno' && Status == 'Entregue') {
      let RM = linha.firstElementChild.innerText
      console.log(RM)
      let result = document.getElementById("modal-atividade-recebida")
      let xmlreq = CriaRequest()
      xmlreq.open("GET", "../../../application/teste.php?txtRm=" + RM + "&funcao=modalAtiv", true);

      xmlreq.onreadystatechange = function () {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

          // Verifica se o arquivo foi encontrado com sucesso
          if (xmlreq.status == 200) {
            result.innerHTML += xmlreq.responseText;//pega a resposta que foi impressa no php
          } else {
            result.innerHTML = "Erro: " + xmlreq.statusText;
          }
        }
      }
      xmlreq.send(null);
    }
  }))
}

const arrumaNome = () => {
    let nome = document.getElementById("nomeUsuario").innerText
    let nomeNovo = nome.split(" ")
    let nomeAtualizado= `${nomeNovo[0]} ${nomeNovo[`${nomeNovo.length - 1}`]}`
    document.getElementById("nomeUsuario").innerText = `${nomeAtualizado}`
}


const app = () => {
  navSlide();
  modalLogin("modal-aviso");
  modalAtiv("modal-atividade");
  modalAtivAluno("modal-atividade-aluno");
  alteraLabel();
  modalAlert("modal-alert-import");
  modalDocAluno("modal-doc-aluno");
  scroll();
  softScroll()
  getDados()
  arrumaNome()
};

app();
