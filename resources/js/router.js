import Vue from 'vue'
import VueRouter from 'vue-router';
import Admin from './components/Admin';
import Rezerwacje from './components/reservation/Rezerwacje';
import AddRezerwacje from './components/reservation/AddRezerwacje';
import EditRezerwacje from './components/reservation/EditRezerwacje';
import Zabieg from './components/zabiegi/Zabieg';
import AddZabiegi from './components/zabiegi/AddZabiegi';
import EditZabiegi from './components/zabiegi/EditZabiegi';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', name: "admin", component: Admin },
        //* REZERWACJE
        { path: '/rezerwacje', name: "rezerwacje", component: Rezerwacje },
        { path: '/rezerwacje/add', name: "addrezerwacje", component: AddRezerwacje },
        { path: '/rezerwacje/edit/:id', name: "editrezerwacje", component: EditRezerwacje },
        //* ZABIEGI
        { path: '/zabiegi', name: "zabiegi", component: Zabieg },
        { path: '/zabiegi/add', name: "addzabiegi", component: AddZabiegi },
        { path: '/zabiegi/edit/:id', name: "editzabiegi", component: EditZabiegi },

    ],
    mode: 'history'
});