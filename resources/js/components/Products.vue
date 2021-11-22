<template>
  <div>
    <h2>Implement jQuery DataTable in Vue Js</h2>
      <table class="my-table" id="datatable">
        <thead>
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Qty.</th>
          <th>Total</th>
          <th>Total+VAT</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(product, index) in products">
          <td>{{product.id}}</td>
          <td>{{product.name}}</td>
          <td>{{product.description}}</td>
          <td  name="price">£{{product.price}}</td>
          <td name="stock">{{product.stock}}</td>
          <td><span>{{amounts[index]}}</span></td>
          <td><button v-on:click="addPrice(product.price); addAmount(amount, index); addItems(items, products, index, amount)">+</button></td>
          <td><span class="total">{{(amounts[index] * product.price || 0).toFixed(2)}}</span></td>
          <td><span class="total-vat">{{(amounts[index] * (product.price * 1.2) || 0).toFixed(2)}}</span></td>
        </tr>

        </tbody>
      </table>
      <div id="totals">
        <span id="subtotals">SUBTOTAL: £{{subtotal}}</span><br>
        <span id="vat">VAT: £{{vat}}</span><br>
        <span>TOTAL:  £{{totals}}</span><br>
        <button v-on:click="saveQuote(items, total, quote)">Save Quote</button>
        <p></p>
      </div>
  </div>
</template>
<script>


export default {

  data() {
    return {
      products: [],
      total: 0.0,
      amount: [],
      items: [],
      quote: []

    }
  },
  created() {
    axios.get('/api/products').then(response => this.products = response.data);
    console.log('success')
  },

  mounted() {

  },

  methods: {

    addPrice: function (price) {
      this.total += price
    },

    addAmount: function (amount, index) {
      if (amount[index]) {
        amount[index]++
      } else {
        amount[index] = 1
      }
    },

    addItems: function (items, products, index, amount) {
      let itemsIndex = items.findIndex((obj => obj.id === products[index].id));
      if (itemsIndex > -1) {
        console.log(itemsIndex)
        items[itemsIndex].amount++

      } else {
        items.push({
          id: products[index].id,
          products: products[index].name,
          amount: amount[index],
          price: products[index].price,

        })
      }

    },

    saveQuote: function (items, total, quote) {
      let vat = total * 0.2;
      let subtotal = total - vat;

      quote.push({
        products: items,
        subtotal: (subtotal).toFixed(2),
        vat: (vat).toFixed(2),
        totals: (total).toFixed(2),
      })

      console.log(quote);

      Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Save Quote',
        showLoaderOnConfirm: true,
        preConfirm: () => {
          axios.post('/api/quotes', {}).then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          }).catch(error => {
            Swal.showValidationMessage(
                `Request failed: ${error}`
            )
          })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: `${result.value.login}'s avatar`,
            imageUrl: result.value.avatar_url
          })
        }
      })
    },
  },

  computed: {
      subtotal: function() {
        let vat = (this.total * 0.2)

        let subtotal = (this.total - vat);

        return (subtotal).toFixed(2);

      },
      vat: function(){
        let vat = (this.total * 0.2)

        return (vat).toFixed(2)
      },
      totals: function () {
        return (this.total).toFixed(2);

    },

    amounts: function() {

        return this.amount;

    },
  }
}



</script>