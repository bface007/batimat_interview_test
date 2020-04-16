import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import {Auth, handleUnexpectedError, User} from '../services/services'

export const store = new Vuex.Store({
    state: {
        checkedAuthentication: false,
        user: null,
    },
    getters: {
        isAuthenticated: state => !_.isNil(state.user),
        checkingAuthentication: state => !state.checkedAuthentication
    },
    mutations: {
        authUser (state, user) {
            state.user = user;
        },
        setAuthenticationChecked (state) {
            state.checkedAuthentication = true;
        }
    },
    actions: {
        me ({commit}) {
            User.getMe().then(response => {
                commit('authUser', response.data)
            }).catch(error => {
                if(!error.response) {
                    handleUnexpectedError(error);
                }
            }).then(() => {
                commit('setAuthenticationChecked');
            })
        }
    }

});
