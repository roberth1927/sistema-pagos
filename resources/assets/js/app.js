require('./bootstrap');
window.Vue = require('vue');

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('categoria', require('./components/Categoria.vue').default);
Vue.component('articulo', require('./components/Articulo.vue').default);
Vue.component('cliente', require('./components/Cliente.vue').default);
Vue.component('proveedor', require('./components/Proveedor.vue').default);
Vue.component('rol', require('./components/Rol.vue').default);
Vue.component('user', require('./components/User.vue').default);
Vue.component('ingreso', require('./components/Ingreso.vue').default);
Vue.component('venta', require('./components/Venta.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('consultaingreso', require('./components/ConsultaIngreso.vue').default);
Vue.component('consultaventa', require('./components/ConsultaVenta.vue').default);
Vue.component('notification', require('./components/Notification.vue').default);

const app = new Vue({
    el: '#app',
    data :{
        menu : 0,
        notifications: []
    },
    created() {
        let me = this;     
        axios.post('notification/get').then(function(response) {
           //console.log(response.data);
           me.notifications=response.data;    
        }).catch(function(error) {
            console.log(error);
        });

        var userId = $('meta[name="userId"]').attr('content');
        
        Echo.private('App.User.' + userId).notification((notification) => {
             me.notifications.unshift(notification); 
        }); 
        
    }        
});
