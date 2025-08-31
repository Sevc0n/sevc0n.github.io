// Prodotti predefiniti
const defaultProducts = [
  { name: "Pozione curativa", price: 0 },
  { name: "Spada d'acciaio", price: 0 },
  { name: "Arco di legno", price: 0 },
  { name: "Scudo di ferro", price: 0 },
  { name: "Amuleto magico", price: 0 }
];

// Carica i prezzi da localStorage
let stored = JSON.parse(localStorage.getItem("prices")) || {};
let products = defaultProducts.map(p => ({
  name: p.name,
  price: stored[p.name] || p.price,
  qty: 0 // quantità NON salvata → si resetta
}));

const productList = document.getElementById("product-list");
const settingsList = document.getElementById("settings-list");
const totalEl = document.getElementById("total");
const perPersonEl = document.getElementById("per-person");
const participantsInput = document.getElementById("participants");

// --- Rendering Calcolatore ---
function renderMain() {
  productList.innerHTML = "";

  products.forEach((p, i) => {
    const div = document.createElement("div");
    div.className = "product";

    const name = document.createElement("span");
    name.textContent = p.name;

    const price = document.createElement("span");
    price.textContent = p.price.toFixed(2);

    const qty = document.createElement("input");
    qty.type = "number";
    qty.min = "0";
    qty.value = p.qty;

    qty.addEventListener("input", () => {
      products[i].qty = parseInt(qty.value) || 0;
      updateTotals();
    });

    div.appendChild(name);
    div.appendChild(price);
    div.appendChild(qty);
    productList.appendChild(div);
  });

  updateTotals();
}

function updateTotals() {
  let total = 0;
  products.forEach(p => total += p.price * p.qty);

  const participants = parseInt(participantsInput.value) || 1;
  const perPerson = total / participants;

  totalEl.textContent = total.toFixed(2);
  perPersonEl.textContent = perPerson.toFixed(
