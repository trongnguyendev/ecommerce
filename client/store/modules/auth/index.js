import Vuex from 'vuex'
import * as getters from './getters'
import mutations from './mutations'
import actions from './actions'

const initialState = {
    status: '',
    isLoggedOut: false
}

export default {
    namespaced: true,

    state: initialState,

    getters: getters,

    mutations: mutations,
    
    actions: actions
}