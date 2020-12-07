import Vue from 'vue'
import VueRouter from 'vue-router';
import Admin from './components/Admin';
import Rezerwacje from './components/reservation/Rezerwacje';
import AddRezerwacje from './components/reservation/AddRezerwacje';
import EditRezerwacje from './components/reservation/EditRezerwacje';
import Fryzjer from './components/fryzjerzy/Fryzjer';
import AddFryzjer from './components/fryzjerzy/AddFryzjer';
import EditFryzjer from './components/fryzjerzy/EditFryzjer';
import Zabieg from './components/zabiegi/Zabieg';
import AddZabiegi from './components/zabiegi/AddZabiegi';
import EditZabiegi from './components/zabiegi/EditZabiegi';


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', name: "admin", component: Admin },
        //! REZERWACJE
        { path: '/rezerwacje', name: "rezerwacje", component: Rezerwacje },
        { path: '/rezerwacje/add', name: "addrezerwacje", component: AddRezerwacje },
        { path: '/rezerwacje/edit/:id', name: "editrezerwacje", component: EditRezerwacje },
        //! FRYZJERZY
        { path: '/fryzjerzy', name: "fryzjerzy", component: Fryzjer },
        { path: '/fryzjerzy/add', name: "addfryzjerzy", component: AddFryzjer },
        { path: '/fryzjerzy/edit/:id', name: "editfryzjerzy", component: EditFryzjer },
        //! ZABIEGI
        { path: '/zabiegi', name: "zabiegi", component: Zabieg },
        { path: '/zabiegi/add', name: "addzabiegi", component: AddZabiegi },
        { path: '/zabiegi/edit/:id', name: "editzabiegi", component: EditZabiegi },

    ],
    mode: 'history'
});