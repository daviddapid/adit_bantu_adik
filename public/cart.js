const items = new Map();

function addItem(item) {
    items.set(item.id, {
        id: item.id,
        name: item.name,
        price: item.price,
        qty: 1,
    });
    console.log(items);
    renderItems();
}
function removeItem(itemId) {
    items.delete(itemId);
    renderItems();
}

function renderItems() {
    $("#items-table").html("");
    $("#form-checkout").html("");

    items.forEach((item) => {
        $("#items-table").append(`
           <tr>
                <td class="align-middle whitespace-nowrap">${item.name}</td>
                <td class="align-middle whitespace-nowrap">Rp. ${formatIDR(
                    item.price
                )}</td>
                <td class="align-middle">
                   <input class="form-control px-2 py-1" style="field-sizing: content;" type="number"
                      value="${item.qty}" onchange="changeQty(${
            item.id
        },this.value)">
                </td>
                <td class="align-middle whitespace-nowrap">Rp. ${formatIDR(
                    item.price * item.qty
                )}</td>
                <td class="table-action align-middle">
                   <button onclick="removeItem(${
                       item.id
                   })" class="btn btn-danger rounded-circle p-0" style="width:32px;height:32px"><i class="bi bi-x-lg"></i></button>
                </td>
            </tr> 
        `);
        $("#form-checkout").append(
            `<input type="hidden" name="items[${item.id}][qty]" value="${item.qty}">
            <input type="hidden" name="items[${item.id}][price]" value="${item.price}">`
        );
    });

    $("#total").text(formatIDR(getTotalPrice()));

    calculateKembalian();
}

function getTotalPrice() {
    let total = 0;
    items.forEach((val) => {
        total += parseInt(val.qty) * parseInt(val.price);
    });

    return total;
}

function changeQty(itemId, qty) {
    if (!qty) {
        qty = 1;
    }
    const item = items.get(itemId);
    item.qty = parseInt(qty);
    items.set(itemId, item);
    renderItems();
}

function formatIDR(number) {
    return new Intl.NumberFormat("id-ID").format(number).toString();
}

function calculateKembalian() {
    const kembalian = $("#tunai").val() - getTotalPrice();
    $("#btn-checkout").attr("disabled", !(kembalian >= 0));
    $("#kembalian").text(formatIDR(kembalian));
    $("#form-checkout").append(
        `<input type="hidden" name="total" value="${getTotalPrice()}">
        <input type="hidden" name="tunai" value="${$("#tunai").val()}">`
    );
}
