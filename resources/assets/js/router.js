import Vue from 'vue';
import Router from 'vue-router';


import Stepone from './components/Stepone.vue';
import Steptwo from './components/Steptwo.vue';
import Stepthree from './components/Stepthree.vue';
import Stepfour from './components/Stepfour.vue';
import Stepfive from './components/Stepfive.vue';
import Stepsix from './components/Stepsix.vue';
// import Stepseven from './components/Stepseven.vue';
// import Stepeight from './components/Stepeight.vue';
// import Stepsroute from './components/Stepsroute.vue';

Vue.use(Router);


export default new Router({
    routes: [
        {
            path: '/',
            name: 'Stepone',
            component: Stepone
        },
        {
            path: '/step-2',
            name: 'Steptwo',
            component: Steptwo
        },
        {
            path: '/step-3',
            name: 'Stepthree',
            component: Stepthree
        },
        {
            path: '/step-4',
            name: 'Stepfour',
            component: Stepfour
        },
        {
            path: '/step-5',
            name: 'Stepfive',
            component: Stepfive
        },
        {
            path: '/step-6',
            name: 'Stepsix',
            component: Stepsix
        },
        /*{
            path: '/coins/:id',
            name: 'Coins',
            component: Coins
        }*/
    ]
});
