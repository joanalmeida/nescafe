var bus = new Vue();

Vue.component('detalles', {
  template: '#detalles-template',
  props: ['list'],
  created: function() {
    this.list = JSON.parse(this.list);
  },
  methods: {
    add: function(detalle) {
      detalle.qty++;
    },
    substract: function(detalle) {
      if(detalle.qty > 1) {
        detalle.qty--;
      } else {
        alert("Look at this Mother Fu.., trying to break my app");
      }
    },
    updatePedido: function(detalle) {
      var data = {
        id: detalle.cafe.id,
        qty: detalle.qty
      };
      $.ajax({
        type: "POST",
        url: "addCoffee",
        data: data,
        success: function(d, status, xhr) {
          detalle.cantidad = d;
          detalle.qty = 1;
        },
        dataType: "text"
      });
    },
    addToCart: function(detalle) {
      bus.$emit('addToCart', detalle);
    }
  }
});

Vue.component('cart', {
  template: '#cart-template',
  data: function() {
    return {
      items: []
    }
  },
  methods: {
    buy: function() {
      this.items.forEach(function(item, indx, arr) {
        var data = {
          id: item.cafe.id,
          qty: item.qty
        };
        $.ajax({
          type: "POST",
          url: "addCoffee",
          data: data,
          success: function(d, status, xhr) {
            //What should i do with this shit?
          },
          dataType: "text" //For now
        });
        console.log(item.cafe.nombre);
      });
    },
    purchase: function() {
      var data = {
        items: this.items
      };
      $.ajax({
        type: "POST",
        url: "addCoffee",
        data: data,
        success: function(d, status, xhr) {
          console.log(d);
        },
        dataType: "text"
      });
    }
  },
  created: function() {
    bus.$on('addToCart', function(detalle) {
      this.items.push(detalle);
    }.bind(this));
  }
});

new Vue({
  el: '#details'
});
