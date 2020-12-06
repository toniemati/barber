import Vue from 'vue'
import VueRouter from 'vue-router';
import Admin from './components/Admin';
import Rezerwacje from './components/reservation/Rezerwacje';
import AddRezerwacje from './components/reservation/AddRezerwacje';
import EditRezerwacje from './components/reservation/EditRezerwacje';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', component: Admin },
        { path: '/rezerwacje', component: Rezerwacje },
        { path: '/rezerwacje/add', component: AddRezerwacje },
        { path: '/rezerwacje/edit/:id', component: EditRezerwacje },
    ],
    mode: 'history'
});