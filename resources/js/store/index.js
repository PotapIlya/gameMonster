import Vue from 'vue';
import Vuex from 'vuex';
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({

    state: {
        allCatalog: [],
        locale: 'en',
        currency: 'USD',
        currencyIcon: '',
        operatingSystem: '',
        categoryImg: [],

        category: null,

        selectCategory: [],

        showList: null,

        axiosSend: {

            category: {
            },
            os: {
            },
            price:{
            },
            search: ''
        }
    },
    getters:
    {
        getShowList(state){
            return state.showList;
        },

        getSelectCategory(state){
            return state.selectCategory;
        },
        getResultSend(state){
            return state.axiosSend;
        },


        // INIT
        getAllCatalog(state){
            return state.allCatalog;
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
        },
        getOperatingSystem(state){
            return state.operatingSystem;
        },
        getCategoryImg(state){
            return state.categoryImg;
        },

    },
    actions: {
        addSelectCategory(context, data){
            context.state.selectCategory.push(data)


        },

        sendAxios({context, state})
        {
            axios.post('api/searchCatalog',
            {
                search: state.axiosSend.search,
                category: state.axiosSend.category,
                os: state.axiosSend.os,
                price: state.axiosSend.price
            })
                .then(response =>
                {
                    state.allCatalog.length = 0;
                    console.log(response.data)
                    state.allCatalog = response.data;
                    // console.log(response.data)
                })
                .catch(error => {
                    console.log(error, 'error')
                })
        },

        // INIT
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
        initCategoryImg(context, data){
            context.commit('initCategoryImg', data)
        },
        initCategory(context, data)
        {
            // data.for

            // console.log(data)
            context.commit('initCategory', data)
        },
        initOperatingSystem(context, data){
            context.commit('initOperatingSystem', data)
        },


        //showList
        showList(content, data){
            content.commit('showList', data);
        },

        //RESET
        resetStorage(context, data)
        {
            context.commit('resetStorage', data)
        },
        //NAV
        setPrice(context, data){
            context.commit('setPrice', data);
        },
        setOs(context, data){
            context.commit('setOs', data);
        },
        setCategory(context, data){
            context.commit('setCategory', data);
        },

        //search
        addSearch(context, data){
            context.commit('addSearch', data);
        },

    },
    mutations: {


        //addSearch
        addSearch(state,data){
            state.axiosSend.search = data
        },

        //showList
        showList(state, data){
            if (data === state.showList){
                state.showList = null;
            } else{
                state.showList = data;
            }
        },


        //RESET
        resetStorage(state, data){

            if (data === 'price')
            {
                state.axiosSend.price = [0, 100];
            }else{
                state.axiosSend[data] = {};
            }
        },
        // NAV
        setPrice(state, data){
            state.axiosSend.price = data;
        },
        setOs(state, data){
            state.axiosSend.os = data;
        },
        setCategory(state, data){
            state.axiosSend.category = data;
        },


        //INIT

        initCategoryImg(state, data){
            state.categoryImg = data;
        },

        initCatalog(state, data){
            state.allCatalog = data;
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
        initOperatingSystem(state, data){
            state.operatingSystem = data;
        },


    }

});