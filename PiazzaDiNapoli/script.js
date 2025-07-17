let cart = [];
let total = 0;

function addToCart(name, price) {
	
	cart.push({ name, price });
	total += price;
	
	updateCart();
}

function updateCart() {
	
	const cartList = document.getElementById("cart-items");
	const totalSpan = document.getElementById("total");
	cartList.innerHTML = "";
	cart.forEach(item => {
		const li = document.createElement("li");
		li.className = "list-group-item d-flex justify-content-between align-items-center";
		li.textContent = item.name;
		const badge = document.createElement("span");
		badge.className = "badge bg-primary rounded-pill";
		badge.textContent = `€${item.price}`;
		li.appendChild(li);
	});
	totalSpan.textContent = total.toFixed(2);
}

const cart = [];
  const cartBody = document.getElementById('cart-body');
  const cartTotal = document.getElementById('cart-total');

  function addToCart(productName, price) {
    const existing = cart.find(item => item.name === productName);
    if (existing) {
      existing.qty++;
    } else {
      cart.push({ name: productName, price: price, qty: 1 });
    }
    renderCart();
  }

  function removeFromCart(index) {
    cart.splice(index, 1);
    renderCart();
  }

  function renderCart() {
    cartBody.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
      const itemTotal = item.price * item.qty;
      total += itemTotal;

      cartBody.innerHTML += `
        <tr>
          <td>${item.name}</td>
          <td>
            <input type="number" min="1" value="${item.qty}" onchange="updateQty(${index}, this.value)" class="form-control text-center" />
          </td>
          <td>€${item.price.toFixed(2)}</td>
          <td>€${itemTotal.toFixed(2)}</td>
          <td>
            <button onclick="removeFromCart(${index})" class="btn btn-sm btn-danger">🗑️</button>
          </td>
        </tr>
      `;
    });

    cartTotal.textContent = `€${total.toFixed(2)}`;
  }

  function updateQty(index, newQty) {
    cart[index].qty = parseInt(newQty);
    renderCart();
  }
