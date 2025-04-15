let inventory = [];

function addItem() {
  const name = document.getElementById("itemName").value.trim();
  const stock = parseInt(document.getElementById("itemStock").value);

  if (name && !isNaN(stock) && stock >= 0) {
    inventory.push({ name, stock });
    updateInventoryList();
    document.getElementById("itemName").value = "";
    document.getElementById("itemStock").value = "";
  } else {
    alert("Isi nama barang dan stok dengan benar.");
  }
}

function sellItem(index) {
  if (inventory[index].stock > 0) {
    inventory[index].stock -= 1;
    updateInventoryList();
  } else {
    alert("Stok habis!");
  }
}

function updateInventoryList() {
  const tbody = document.getElementById("inventoryList");
  tbody.innerHTML = "";

  inventory.forEach((item, index) => {
    const row = `
      <tr>
        <td>${item.name}</td>
        <td>${item.stock}</td>
        <td><button class="sell" onclick="sellItem(${index})">Jual</button></td>
      </tr>
    `;
    tbody.innerHTML += row;
  });
}
