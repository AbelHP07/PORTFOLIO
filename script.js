const usuario = "AbelHP07";
const repo = "PORTFOLIO";
const rama = "main";

const links = [
  {
    title: "Carpeta principal (1.º, 2.º año y Mini-Proyecto)",
    desc: "Abre la raíz del repositorio con todas las carpetas",
    url: `https://github.com/${usuario}/${repo}`,
    tag: "REPO"
  },
  {
    title: "Primer año",
    desc: "Acceso directo a la carpeta primerAño",
    url: `https://github.com/${usuario}/${repo}/blob/${rama}/primerAño/index.html`,
    tag: "1.º AÑO"
  },
  {
    title: "Segundo año",
    desc: "Acceso directo a la carpeta segundoAño",
    url: `https://github.com/${usuario}/${repo}/tree/${rama}/segundoAño`,
    tag: "2.º AÑO"
  },
  {
    title: "Mini proyecto de primer año",
    desc: "Proyecto de primer año alojado en repositorio privado",
    url: `https://github.com/${usuario}/${repo}/tree/${rama}/Mini-Proyecto(PrimerAño)`,
    tag: "MINI PROYECTO"
  }
];

const linksGrid = document.getElementById("linksGrid");

linksGrid.innerHTML = links
  .map(
    (item) => `
      <a class="card" href="${item.url}" target="_blank" rel="noopener noreferrer">
        <div>
          <div class="card-title">${item.title}</div>
          <div class="card-desc">${item.desc}</div>
        </div>
        <span class="badge">${item.tag}</span>
      </a>
    `
  )
  .join("");
