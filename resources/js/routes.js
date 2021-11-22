import Home from './components/Home';
import Products from './components/Products';
import Quote from './components/Quote';



export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/products',
            component: Products

        },
        {
            path: '/quote',
            component: Quote
        }
    ]
};
