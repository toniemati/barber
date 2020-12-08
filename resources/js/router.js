import Vue from 'vue'
import VueRouter from 'vue-router';
import Admin from './components/Admin';
import Rezerwacje from './components/reservation/Rezerwacje';
import AddRezerwacje from './components/reservation/AddRezerwacje';
import EditRezerwacje from './components/reservation/EditRezerwacje';
import RezerwacjeFryzjer from './components/reservation/RezerwacjeFryzjer';
import Fryzjer from './components/fryzjerzy/Fryzjer';
import AddFryzjer from './components/fryzjerzy/AddFryzjer';
import EditFryzjer from './components/fryzjerzy/EditFryzjer';
import Zabieg from './components/zabiegi/Zabieg';
import AddZabiegi from './components/zabiegi/AddZabiegi';
import EditZabiegi from './components/zabiegi/EditZabiegi';
import Cennik from './components/cennik/Cennik';


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', name: "admin", component: Admin },
        //! REZERWACJE
        { path: '/rezerwacje', name: "rezerwacje", component: Rezerwacje },
        { path: '/rezerwacje/add', name: "addrezerwacje", component: AddRezerwacje },
        { path: '/rezerwacje/edit/:id', name: "editrezerwacje", component: EditRezerwacje },
        { path: '/rezerwacje/fryzjer/:id', name: "rezerwacjefryzjer", component: RezerwacjeFryzjer },
        //! FRYZJERZY
        { path: '/fryzjerzy', name: "fryzjerzy", component: Fryzjer },
        { path: '/fryzjerzy/add', name: "addfryzjerzy", component: AddFryzjer },
        { path: '/fryzjerzy/edit/:id', name: "editfryzjerzy", component: EditFryzjer },
        //! ZABIEGI
        { path: '/zabiegi', name: "zabiegi", component: Zabieg },
        { path: '/zabiegi/add', name: "addzabiegi", component: AddZabiegi },
        { path: '/zabiegi/edit/:id', name: "editzabiegi", component: EditZabiegi },
        //! CENNIK
        { path: '/cennik', name: 'cennik', component: Cennik },

    ],
    mode: 'history'
});