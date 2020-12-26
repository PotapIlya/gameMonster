import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({

    state: {
        catalog: null,
        locale: 'en',
        currency: 'USD',
        currencyIcon: '',
        category: null,
    },
    getters:
    {
        getCatalog(state){
            return state.catalog;
        },
        getLocale(state){
            return state.locale;
        },
        getCurrency(state){
            return state.currency;
        },
        getCurrencyIcon(state){
            return state.currencyIcon;
        },
        getCategory(state){
            return state.category;
        }

    },
    actions: {
        initCatalog(context, data){
            context.commit('initCatalog', data)
        },
        initLocale(context, data){
            context.commit('initLocale', data)
        },
        initCurrency(context, data){
            context.commit('initCurrency', data)
        },
        initCurrencyIcon(context, data){
            context.commit('initCurrencyIcon', data)
        },
        initCategory(context, data){
            context.commit('initCategory', data)
        }
    },
    mutations: {
        initCatalog(state, data){
            state.catalog = data
        },
        initLocale(state, data){
            state.locale = data;
        },
        initCurrency(state, data){
            state.currency = data;
        },
        initCurrencyIcon(state, data){
            state.currencyIcon = data;
        },
        initCategory(state, data){
            state.category = data;
        },


    }

});