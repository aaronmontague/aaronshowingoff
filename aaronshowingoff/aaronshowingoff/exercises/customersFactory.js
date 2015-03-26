(function() {
    var customersFactory = function() {
        var customers = [
            { id: 1, name: 'Mike', joined: '2012-02-18', city: 'San Francisco', orderTotal: 9.9912, orders: [{ id: 1, product: 'Shoes', total: 9.9912 }, { id: 2, product: 'Tent', total: 29.99 }] },
            { id: 2, name: 'Shannon', joined: '2012-04-11', city: 'San Francisco', orderTotal: 27.89, orders: [{ id: 3, product: 'Golf Clubs', total: 199.99 }, { id: 4, product: 'Racquet', total: 19.99 }] },
            { id: 3, name: 'Peter', joined: '2011-12-08', city: 'Orlando', orderTotal: 109.483782, orders: [{ id: 5, product: 'Scarf', total: 16.89 }] },
            { id: 4, name: 'Smyth', joined: '2010-05-11', city: 'Scottsdale', orderTotal: 43.22, orders: [{ id: 6, product: 'Shoes', total: 9.9912 }] },
            { id: 5, name: 'Borgy', joined: '2013-02-19', city: 'Burlington', orderTotal: 56.99, orders: [{ id: 7, product: 'Badminton Set', total: 49.99 }, { id: 8, product: 'Tent', total: 29.99 }] }
        ];

        https://www.udemy.com/angularjs-jumpstart/#/lecture/1062178

        var factory = {};
        factory.getCustomers = function() {
            return customers;
        };

        factory.getCustomer = function(customerId){
            for (var i = 0, len = customers.length; i < len; i++) {
                if (customers[i].id === parseInt(customerId)) {
                    return customers[i];
                }
            }
            return {};
        };

        return factory;
    };

    angular.module('customersApp')
        .factory('customersFactory', customersFactory);

}());