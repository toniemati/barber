import Vue from 'vue'
import VueRouter from 'vue-router';
import Admin from './components/Admin';
import Rezerwacje from './components/reservation/Rezerwacje';
import AddRezerwacje from './components/reservation/AddRezerwacje';
import EditRezerwacje from './components/reservation/EditRezerwacje';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', name: "admin", component: Admin },
        { path: '/rezerwacje', name: "rezerwacje", component: Rezerwacje },
        { path: '/rezerwacje/add', name: "addrezerwacje", component: AddRezerwacje },
        { path: '/rezerwacje/edit/:id', name: "editrezerwacje", component: EditRezerwacje },
    ],
    mode: 'history'
});